<?php

namespace App\Livewire\Ticket;

use App\Models\Ticket;
use Livewire\Component;

class ListTickets extends Component
{
    public function render()
    {
        return view('livewire.ticket.list-tickets', [
            'tickets' => auth()->user()->tickets
        ]);
    }
}
