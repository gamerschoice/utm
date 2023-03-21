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

    public function links(Request $request)
    {
        $domainObj = Domain::where('id', $request->domain )->first();
        return view('domains.links', [
            'domain' => $domainObj
        ]);
    }

}
