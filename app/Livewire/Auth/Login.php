<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Url;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Spatie\Honeypot\Http\Livewire\Concerns\HoneypotData;
use Spatie\Honeypot\Http\Livewire\Concerns\UsesSpamProtection;
use WireUi\Traits\Actions;

class Login extends Component
{
    use UsesSpamProtection;
    use Actions;

    #[Validate('required|string|min:5')]
    public $usernameOrEmail = '';

    #[Validate('required|min:6|max:15|string')]
    public $password = '';

    /** @var bool */
    public $remember = false;

    #[Url]
    public $redirect;

    public HoneypotData $extraFields;

    public function mount()
    {
        $this->extraFields = new HoneypotData();
    }

    public function authenticate()
    {
        try {
            $this->protectAgainstSpam();
        } catch (\Throwable $th) {
            $this->notification()->error(
                $description = __('auth.spam')
            );
            return;
        }

        $this->validate();

        $user = User::where('email', $this->usernameOrEmail)
            ->orWhere('username', $this->usernameOrEmail)
            ->first();

        if (is_null($user) || !Hash::check($this->password, $user->password)) {
            $this->addError('usernameOrEmail', trans('auth.failed'));
            return;
        }

        Auth::login($user, $this->remember);

        return redirect()->intended($this->redirect ?? route('home'));
    }

    public function render()
    {
        return view('livewire.auth.login')->extends('layouts.auth');
    }
}
