<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

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

    /**
     * @todo Gate
     */
    public function view(Request $request)
    {
        $domainObj = Domain::where('id', $request->domain )->first();

        if(!$domainObj) {
            return redirect()->route('domain.index');
        }
        
        return view('domains.view', [
            'domain' => $domainObj
        ]);
    }

}
