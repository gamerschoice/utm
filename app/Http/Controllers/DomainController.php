<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use Illuminate\Http\Request;

class DomainController extends Controller
{

    public function show(Request $request, Domain $domain)
    {
        
        $team = $request->user()->currentTeam;

        return view('domains.show', [
            'links' => $domain->links()->paginate(25)
        ]);
    }

}
