<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function __invoke()
    {
        return response(file_get_contents(Storage::url('sitemap.xml')), 200, [
            'Content-Type' => 'application/xml'
        ]);
    }
}
