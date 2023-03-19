<?php

namespace App\Actions\Links;

use App\Models\Team;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;

class CreateLink
{
    public function create(Team $team, array $data)
    {
        try {
            DB::beginTransaction();

            $link = $team->links()->create([
                'destination' => $data['destination'],
                'shortlink' => Str::random(8),
                'published' => true
            ]);

            DB::commit();

            return $link;
        } catch (QueryException $e) {
            DB::rollback();
            $this->create($team, $data);
        }
    }
}