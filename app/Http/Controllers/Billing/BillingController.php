<?php

namespace App\Http\Controllers\Billing;

use App\Models\Team;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Cashier\Exceptions\IncompletePayment;
use App\Models\Plan;

class BillingController extends Controller
{
    public function index(Request $request)
    {
        return view('billing.index', [
            'intent' => $request->user()->currentTeam->createSetupIntent()
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
                [$exception->payment->id, 'redirect' => route('billing')]
            );
        }

        return back()->with([
            'flash.banner' => 'Welcome to UTM Wise!'
        ]);
    }
}