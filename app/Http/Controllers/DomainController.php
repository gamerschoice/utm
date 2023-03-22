<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use Illuminate\Http\Request;

class DomainController extends Controller
{

    public function index(Request $request) 
    {
        $team = $request->user()->currentTeam;

        return view('domains.index', [
            'domains' => $team->domains()->paginate(25)
        ]);
    }

    public function create()
    {
        return view('domains.create');
    }

    public function show(Request $request, Domain $domain)
    {
        
        $team = $request->user()->currentTeam;

        return view('domains.show', [
            'links' => $domain->links()->paginate(25)
        ]);
    }

}
