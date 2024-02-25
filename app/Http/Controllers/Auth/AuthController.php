<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|min:3|max:69|string',
            'last_name' => 'required|min:3|max:69|string',
            'username' => [
                'regex:/[a-z0-9_]{3,15}[^-_]+$/',
                'required',
                'min:5',
                'max:15',
                'string',
                'unique:users',
            ],
            'email' => 'required|email|indisposable|unique:users',
            'password' => 'required|min:6|max:40|string',
            'password_confirmation' => 'required|same:password'
        ]);

        $user = User::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        event(new Registered($user));

        Auth::login($user, true);

        return redirect()->intended($this->redirect ?? route('home'));
    }
}
