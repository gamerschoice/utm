<?php

namespace App\Actions\Links;

use App\Models\Domain;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;
use App\Events\LinkCreated;
use App\Events\BulkLinksCreated;
use App\Exceptions\CloudflareException;
use App\Services\Cloudflare;
use Filament\Notifications\Notification; 

class CreateLink
{

    protected $cloudflare;

    public function __construct(Cloudflare $cloudflare)
    {
        $this->cloudflare = $cloudflare;
    }

    public function createBulk( Domain $domain, array $links )
    {
        try {
            
            DB::beginTransaction();
            
            foreach($links as $link) {
                
                $domain->links()->create([
                    'destination' => $link['destination'],
                    'utm_source' => $link['utm_source'],
                    'utm_medium' => $link['utm_medium'],
                    'utm_campaign' => $link['utm_campaign'],
                    'utm_term' => $link['utm_term'],
                    'utm_content' => $link['utm_content'],
                    'utm_source_platform' => $link['utm_source_platform'],
                    'utm_creative_format' => $link['utm_creative_format'],
                    'utm_marketing_tactic' => $link['utm_marketing_tactic'],
                    'notes' => $link['notes'],
                    'shortlink' => Str::random(8)
                ]);

            }

            DB::commit();

            BulkLinksCreated::dispatch($domain->links);

            Notification::make() 
                ->title('Links imported')
                ->body('Your links have been imported successfully.')
                ->success()
                ->send(); 

            return true;

        } catch (QueryException | CloudflareException $e) {
            DB::rollback();

            Notification::make() 
                ->title('Links could not be imported')
                ->body('There\'s been a problem importing your links. Please try again later. If the problem persists, please reach out to support.')
                ->danger()
                ->send(); 

            return false;
        }


    }

    public function create(Domain $domain, array $data)
    {
        try {
            DB::beginTransaction();

            $link = $domain->links()->create([
                'destination' => $data['destination'],
                'utm_source' => $data['utm_source'],
                'utm_medium' => $data['utm_medium'],
                'utm_campaign' => $data['utm_campaign'],
                'utm_term' => $data['utm_term'],
                'utm_content' => $data['utm_content'],
                'utm_source_platform' => $data['utm_source_platform'],
                'utm_creative_format' => $data['utm_creative_format'],
                'utm_marketing_tactic' => $data['utm_marketing_tactic'],
                'notes' => $data['notes'],
                'shortlink' => Str::random(8)
            ]);

            DB::commit();

            LinkCreated::dispatch($link);

            return $link;

        } catch (QueryException $e) {
            DB::rollback();
            $this->create($domain, $data);
        }
    }
}