<?php

namespace App\Livewire\Auth;

use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Register extends Component
{
    #[Validate('required|min:3|max:69|string')]
    public string $firstName = '';

    #[Validate('required|min:3|max:69|string')]
    public string $lastName = '';

    #[Validate([
        'regex:/[a-z0-9_]{3,15}[^-_]+$/',
        'required',
        'min:5',
        'max:15',
        'string',
        'unique:users',
    ])]
    public string $username = '';

    #[Validate('required|email|unique:users')]
    public string $email = '';

    #[Validate('required|min:6|max:40|string')]
    public string $password = '';

    #[Validate('required|min:6|max:40|same:password')]
    public string $passwordConfirmation = '';

    public function register()
    {
        $this->validate();

        $user = User::create([
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'username' => $this->username,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        event(new Registered($user));

        Auth::login($user, true);

        return redirect()->intended(route('home'));
    }

    public function render()
    {
        return view('livewire.auth.register')->extends('layouts.auth');
    }
}
