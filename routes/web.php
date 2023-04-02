<?php

use App\Models\Plan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Billing\BillingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\LinksController;
use App\Http\Controllers\InvoiceController;

use App\Services\Cloudflare;
use App\Models\Link;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('holding', [
        'plans' => Plan::whereNot('sku', 'trial')->get() 
    ]);
});

Route::get('/privacy', function () {
    return view('privacy');
})->name('privacy');

Route::get('/terms', function () {
    return view('terms');
})->name('terms');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'team.configured'
])->group(function () {
    Route::get('/marketing', function () {
        return view('welcome', [
            'plans' => Plan::whereNot('sku', 'trial')->get() 
        ]);
    });
    

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/domains', [DomainController::class, 'index'])->name('domain.index');
    Route::get('/domains/create', [DomainController::class, 'create'])->name('domain.create');
    Route::get('/domains/{domain}', [DomainController::class, 'view'])->name('domain.view');
    Route::get('/link/{domain_id}/wizard', [LinksController::class, 'create'])->name('link.create');
    Route::get('/link/{domain_id}/advanced', [LinksController::class, 'advanced'])->name('link.advanced');

    Route::middleware(['team.owner'])->group(function () {
        Route::get('/billing', [BillingController::class, 'index'])->name('billing');
        Route::post('/billing', [BillingController::class, 'create']);
        Route::get('/billing/invoice/{invoice}', InvoiceController::class)->name('invoice');
    });
});
