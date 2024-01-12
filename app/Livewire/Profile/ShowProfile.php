<?php

namespace App\Livewire\Profile;

use App\Models\User;
use Livewire\Component;

class ShowProfile extends Component
{
    public User $user;
    public $additionalAttributes;

    public function mount(User $user)
    {
        $this->user = $user;
        foreach(auth()->user()->attributes as $item) {
            $this->additionalAttributes[$item->type->value] = [
                'value' => $item->value,
                'key' => $item->key,
                'icon' => $item->type->iconName(),
                'label' => $item->type->label(),
                'html' => $item->type->htmlValue($item->value),
            ];
        }
    }

    public function render()
    {
        return view('livewire.profile.show-profile');
    }
}
