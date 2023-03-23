<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index(Request $request) 
    {
        $domains = Domain::where('team_id', $request->user()->currentTeam->id)
                    ->orderBy('created_at', 'desc')
                    ->with(['links' => function($query) {
                        $query->orderBy('created_at', 'desc')
                            ->limit(3);
                    }])
                    ->take(9)
                    ->get();

        return view('dashboard', [
            'domains' => $domains
        ]);
    }

}
