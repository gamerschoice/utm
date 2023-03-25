<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use Illuminate\Http\Request;

class LinksController extends Controller 
{

    public function create(Request $request)
    {
        
        $domain = Domain::find( $request->domain_id );

        return view('links.create', [
            'domain' => $domain
        ]);
    }

    public function advanced(Request $request)
    {
        $domain = Domain::find( $request->domain_id );
        return view('links.advanced', [
            'domain' => $domain
        ]);
    }

  
}