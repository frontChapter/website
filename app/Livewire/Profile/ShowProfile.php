<?php

namespace App\Livewire\Profile;

use App\Models\User;
use Livewire\Component;

class ShowProfile extends Component
{
    public User $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.profile.show-profile');
    }
}
