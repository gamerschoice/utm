<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Link;
use App\Services\Cloudflare;

class BulkLinksCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $links;

    /**
     * Create a new event instance.
     */
    public function __construct( $links )
    {
        $this->links = $links;
    }


}
