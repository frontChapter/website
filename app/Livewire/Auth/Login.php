<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Login extends Component
{
    #[Validate('required|string|min:5')]
    public $usernameOrEmail = '';

    #[Validate('required|min:6|max:15|string')]
    public $password = '';

    /** @var bool */
    public $remember = false;

    public function authenticate()
    {
        $this->validate();

        $user = User::where('email', $this->usernameOrEmail)
            ->orWhere('username', $this->usernameOrEmail)
            ->first();

        if(is_null($user) || !Hash::check($this->password, $user->password)){
            $this->addError('usernameOrEmail', trans('auth.failed'));

            return;
        }

        Auth::login($user, $this->remember);

        return redirect()->intended(route('home'));
    }

    public function render()
    {
        return view('livewire.auth.login')->extends('layouts.auth');
    }
}
