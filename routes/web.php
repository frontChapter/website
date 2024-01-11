<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Passwords\Confirm;
use App\Livewire\Auth\Passwords\Email;
use App\Livewire\Auth\Passwords\Reset;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\Verify;
use App\Livewire\Home\ShowHome;
use App\Livewire\Profile\ShowProfile;
use App\Livewire\Ticket\ListTickets;
use App\Livewire\User\ListAdditional;
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

Route::view('/', 'welcome')->name('home');


Route::get('password/reset', Email::class)
    ->name('password.request');

Route::get('password/reset/{token}', Reset::class)
    ->name('password.reset');

Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)
        ->name('login');

    Route::get('register', Register::class)
        ->name('register');
});

Route::get('/profile/{user:username}', ShowProfile::class)->name('profile');

Route::middleware('auth')->group(function () {

    Route::get('/conf1402', ShowHome::class)->name('conf1402');

    Route::get('/tickets', ListTickets::class)->name('ticket');

    Route::prefix('user')->group(function () {
        Route::get('/additional', ListAdditional::class)->name('profile.additional');
    });

    Route::get('email/verify', Verify::class)
        ->middleware('throttle:6,1')
        ->name('verification.notice');

    Route::get('password/confirm', Confirm::class)
        ->name('password.confirm');
});
