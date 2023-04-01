<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Contentful\Delivery\Client as DeliveryClient;
use Contentful\Delivery\Query as DeliveryQuery;
use GrahamCampbell\Markdown\Facades\Markdown;

class BlogController extends Controller
{
    
    private $client;

    public function __construct(DeliveryClient $client)
    {
        $this->client = $client;
    }

    public function index()
    {
        $query = new DeliveryQuery();
        $query->setContentType('blogPost');
        $entries = $this->client->getEntries($query);
        $posts = [];
        if($entries) {
            foreach($entries as $entry) {
                $posts[] = [
                    'title' => $entry->getTitle(),
                    'date' => $entry->getSystemProperties()->getCreatedAt()->format('jS F Y'),
                    'excerpt' => $entry->getExcerpt(),
                    'slug' => $entry->getSlug()
                ];
            }
        }

        return view('blog.index', [
            'posts' => $posts
        ]);
    }

    public function view( string $slug )
    {
        $query = new DeliveryQuery();
        $query->setContentType('blogPost')
            ->where('fields.slug', $slug)
            ->setLimit(1);

        $posts = $this->client->getEntries($query);
        if($posts) {
            
            return view('blog.view', [
                'post' => [
                    'title' => $posts[0]->getTitle(),
                    'body' => Markdown::convert($posts[0]->getBody())->getContent(),
                    'date' => $posts[0]->getSystemProperties()->getCreatedAt()->format('jS F Y')
                ]
            ]);

        } else {
            abort(404);
        }
    }

}
