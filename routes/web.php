<?php

use App\Http\Controllers\Auth\AuthController;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Passwords\Confirm;
use App\Livewire\Auth\Passwords\Email;
use App\Livewire\Auth\Passwords\Reset;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\Verify;
use App\Livewire\Festival\ListSites;
use App\Livewire\Festival\RegisterSite;
use App\Livewire\Festival\SingleSite;
use App\Livewire\Gallery;
use App\Livewire\Home\ShowHome;
use App\Livewire\Profile\ShowProfile;
use App\Livewire\Reserved;
use App\Livewire\User\EditAdditionalData;
use App\Livewire\User\Gift\ListGifts;
use App\Livewire\User\Ticket\ListTickets;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return redirect()->route('conf1402');
})->name('home');

Route::get('/profile/{user:username}', ShowProfile::class)->name('profile')->lazy();

Route::middleware(['utm.store'])->prefix('/festival')
    ->group(function () {
        Route::get('/', ListSites::class)->name('festival-site');
        Route::get('/register', RegisterSite::class)
            ->name('festival-site.register')
            ->middleware(['auth', 'verified']);
        Route::get('/{festivalSite:uuid}', SingleSite::class)->name('festival-site.single');
        Route::get('/{festivalSite:uuid}/edit', RegisterSite::class)
            ->name('festival-site.edit')
            ->middleware(['auth', 'verified']);
    });

Route::get('/conf1402', ShowHome::class)->name('conf1402')
    ->middleware('utm.store');

Route::get('/reserved', function () {
    return redirect()->route('gallery');
})->name('reserved');

Route::get('/gallery', Gallery::class)->name('gallery')
    ->middleware('utm.store');

Route::middleware('auth')->group(function () {
    Route::prefix('user')->group(function () {
        Route::get('/tickets', ListTickets::class)->name('ticket')->middleware('verified');
        Route::get('/additional-data', EditAdditionalData::class)->name('profile.additional');
        Route::get('/gifts', ListGifts::class)->name('gift');
    });

    Route::get('email/verify', Verify::class)
        ->middleware(['throttle:6,1'])
        ->name('verification.notice');

    Route::get('password/confirm', Confirm::class)
        ->name('password.confirm');
});

Route::get('password/reset', Email::class)
    ->name('password.request');

Route::get('password/reset/{token}', Reset::class)
    ->name('password.reset');

Route::middleware(['guest'])->group(function () {
    Route::get('login', Login::class)
        ->name('login');

    // Route::get('register', Register::class)
    //     ->name('register');
    Route::post('register', [AuthController::class, 'register'])
        ->middleware(['honey', 'honey-recaptcha'])
        ->name('register');
});
