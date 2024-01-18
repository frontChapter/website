<?php

namespace App\Livewire\Home;

use App\Models\User;
use Illuminate\Database\Query\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class TicketBuyers extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.home.ticket-buyers', [
            'users' => User::whereHas('tickets')->inRandomOrder()->get(),
        ]);
    }
}
