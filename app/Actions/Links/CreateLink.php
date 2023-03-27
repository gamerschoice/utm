<?php

namespace App\Actions\Links;

use App\Models\Domain;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;
use App\Events\LinkCreated;

class CreateLink
{

    public function createBulk( Domain $domain, array $links )
    {
        try {
            
            $created = [];
            DB::beginTransaction();
            
            foreach($links as $link) {
            
                
                $created[] = $domain->links()->create([
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

            /** 
             * dispatch inserted links to listener 
             * to mass update KVs in one request?
            */
            //LinksImported::dispatch($link);

        } catch (QueryException $e) {
            DB::rollback();
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