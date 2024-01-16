<?php

namespace App\Livewire\Home;

use Adzbuck\LaravelUTM\ParameterTracker;
use Livewire\Component;

class ShowHome extends Component
{
    public function render()
    {
        $parameterTracker = app(ParameterTracker::class);

        return view('livewire.home.show-home');
    }
}
