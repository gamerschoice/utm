<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Jetstream\Events\TeamCreated;
use Laravel\Jetstream\Events\TeamDeleted;
use Laravel\Jetstream\Events\TeamUpdated;
use Laravel\Jetstream\Team as JetstreamTeam;
use Laravel\Cashier\Billable;

class Team extends JetstreamTeam
{
    use HasFactory;
    use Billable;

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'personal_team' => 'boolean',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'personal_team',
        'website',
        'dns_configured'
    ];

    /**
     * The event map for the model.
     *
     * @var array<string, class-string>
     */
    protected $dispatchesEvents = [
        'created' => TeamCreated::class,
        'updated' => TeamUpdated::class,
        'deleted' => TeamDeleted::class,
    ];

    public function domains()
    {
        return $this->hasMany(Domain::class);
    }

    /**
     * @deprecated 20-03-2023 get links via Domain instead of Team
     */
    public function links()
    {
        return $this->hasMany(Link::class);
    }

    /**
     * @deprecated 20-03-2023 DNS Verification on Domain instead of Team
     */
    public function dnsVerification()
    {
        return $this->hasOne(DnsVerification::class);
    }
}
