<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use Illuminate\Http\Request;

class DomainController extends Controller
{

    public function index(Request $request) 
    {
        return view('domains.index');
    }

    public function create()
    {
        return view('domains.create');
    }

    public function view(Request $request)
    {
        $domainObj = Domain::where('id', $request->domain )->first();
        return view('domains.view', [
            'domain' => $domainObj
        ]);
    }

}
