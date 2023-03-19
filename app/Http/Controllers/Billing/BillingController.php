<?php

namespace App\Http\Controllers\Billing;

use App\Models\Team;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Cashier\Exceptions\IncompletePayment;

class BillingController extends Controller
{
    public function index(Request $request)
    {
        $teams = $request->user()->ownedTeams;

        $team = $request->user()->currentTeam;

        return view('billing.index', [
            'teams' => $teams,
            'intent' => $team->createSetupIntent()
        ]);
    }

    public function create(Request $request)
    {
        $team = $request->user()->currentTeam;

        try {
            $team->newSubscription('default', 'price_1MnGuIHwvhcWXVfotZEavnmw')->create($request->payment_method);
        } catch (IncompletePayment $e) {
            return redirect()->route(
                'cashier.payment',
                [$exception->payment->id, 'redirect' => route('home')]
            );
        }

        return back()->with([
            'succes' => 'Welcome to UTM Tracker!'
        ]);
    }
}