<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class LinksController extends Controller 
{

    public function create(Request $request)
    {
        $domain = Domain::find( $request->domain_id )->first();
        return view('links.create', [
            'domain' => $domain
        ]);
    }

    public function advanced(Request $request)
    {
        $domain = Domain::find( $request->domain_id )->first();
        return view('links.advanced', [
            'domain' => $domain
        ]);
    }

  
}