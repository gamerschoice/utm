<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{

    public function index(Request $request) 
    {
        $domains = Domain::where('team_id', $request->user()->currentTeam->id)
                    ->orderBy('created_at', 'desc')
                    ->take(9)
                    ->with(['links'])
                    ->get()
                    ->map( function ( $query ) {
                        $query->setRelation('links', $query->links->take(3));
                        return $query;
                    });
                    

        return view('dashboard', [
            'domains' => $domains
        ]);
    }

}
