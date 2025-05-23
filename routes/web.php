<?php

use App\Models\Plan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Billing\BillingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\LinksController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\SitemapController;
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

Route::get('/sitemap', SitemapController::class);

Route::get('/', function () {
    return view('home', [
        'plans' => Plan::all() 
    ]);
})->name('home');

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'view'])->name('blog.view');

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
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::middleware(['team.active'])->group(function () {
        Route::get('/domains', [DomainController::class, 'index'])->name('domain.index');
        Route::get('/domains/create', [DomainController::class, 'create'])->name('domain.create');

        Route::middleware(['ownedByTeam'])->group(function () {
            Route::get('/domains/{domain}', [DomainController::class, 'view'])->name('domain.view');
            Route::get('/link/{domain_id}/wizard', [LinksController::class, 'create'])->name('link.create');
            Route::get('/link/{domain_id}/advanced', [LinksController::class, 'advanced'])->name('link.advanced');
        });
    });

    Route::middleware(['team.owner'])->group(function () {
        Route::get('/billing', [BillingController::class, 'index'])->name('billing');
        Route::get('/billing/invoice/{invoice}', InvoiceController::class)->name('invoice');
    });
});
