<?php

namespace App\Livewire\Profile\Ticket;

use App\Models\Ticket;
use Livewire\Component;

class ListTickets extends Component
{
    public function render()
    {
        return view('livewire.profile.ticket.list-tickets', [
            'tickets' => auth()->user()->tickets
        ]);
    }
}
