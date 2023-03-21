<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Billing\BillingController;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\LinksController;

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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'team.configured'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/billing', [BillingController::class, 'index'])->name('billing');
    Route::post('/billing', [BillingController::class, 'create']);

    Route::resource('/links', LinksController::class);

    Route::get('/domains', [DomainController::class, 'index'])->name('domain.index');
    Route::get('/domains/{domain}', [DomainController::class, 'show'])->name('domain.links');

});
