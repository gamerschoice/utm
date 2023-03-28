<?php

namespace Tests\Feature;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Fortify\Features;
use Laravel\Jetstream\Jetstream;
use Tests\TestCase;
use App\Models\User;

class CanViewBillingTest extends TestCase
{
    use RefreshDatabase;

    public function test_team_owners_can_view_billing()
    {
        $user = User::factory()->withPersonalTeam()->create();

        $response = $this->actingAs($user)->get('/billing');

        $response->assertSuccessful();
    }

    public function test_team_members_cannot_view_billing()
    {
        $user = User::factory()->withPersonalTeam()->create();

        $user->currentTeam->users()->attach(
            $otherUser = User::factory()->create(), ['role' => 'not-admin']
        );

        $otherUser->update(['current_team_id' => $user->currentTeam->id]);

        $response = $this->actingAs($otherUser)->get('/billing');

        $response->assertRedirectToRoute('dashboard');
        $response->assertSessionHas('flash.banner');
        $response->assertSessionHas('flash.bannerStyle', 'danger');
    }

    public function test_members_cannot_download_invoices()
    {
        $user = User::factory()->withPersonalTeam()->create();

        $user->currentTeam->users()->attach(
            $otherUser = User::factory()->create(), ['role' => 'not-admin']
        );

        $otherUser->update(['current_team_id' => $user->currentTeam->id]);

        $response = $this->actingAs($otherUser)->get('/billing/invoice/123');

        $response->assertRedirectToRoute('dashboard');
    }
}