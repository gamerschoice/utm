<?php

namespace App\Actions\Links;

use App\Models\Domain;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;

class CreateLink
{
    public function create(Domain $domain, array $data)
    {
        try {
            DB::beginTransaction();

            $link = $domain->links()->create([
                'destination' => $data['destination'],
                'shortlink' => Str::random(8),
                'published' => true
            ]);

            DB::commit();

            return $link;
        } catch (QueryException $e) {
            DB::rollback();
            $this->create($domain, $data);
        }
    }
}