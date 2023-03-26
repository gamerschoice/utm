<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Billing\BillingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\LinksController;

use App\Services\CloudFlare;

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

Route::get('/cf-test', function (CloudFlare $cf) {

    return $cf->test();
    
});

Route::get('/', function () {
    return view('holding');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'team.configured'
])->group(function () {

    Route::get('/marketing', function () {
        return view('welcome');
    });
    

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/billing', [BillingController::class, 'index'])->name('billing');
    Route::post('/billing', [BillingController::class, 'create']);

    //Route::resource('/links', LinksController::class);

    Route::get('/domains', [DomainController::class, 'index'])->name('domain.index');
    Route::get('/domains/create', [DomainController::class, 'create'])->name('domain.create');
    Route::get('/domains/{domain}', [DomainController::class, 'view'])->name('domain.view');
    Route::get('/link/{domain_id}/wizard', [LinksController::class, 'create'])->name('link.create');
    Route::get('/link/{domain_id}/advanced', [LinksController::class, 'advanced'])->name('link.advanced');
});
