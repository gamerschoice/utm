<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LinksController extends Controller 
{
    public function index(Request $request)
    {
        $team = $request->user()->currentTeam;

        return view('links.index', [
            'links' => $team->links
        ]);
    }

    public function create(Request $request)
    {
        return view('links.create');
    }

    public function show()
    {
        return view('links.show');
    }

    public function store()
    {
        # code...
    }

    public function edit()
    {
        # code...
    }

    public function update()
    {
        # code...
    }

    public function delete()
    {
        # code...
    }
}