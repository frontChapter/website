<?php

namespace App\Livewire\User\Ticket;

use App\Models\Ticket;
use Livewire\Attributes\Url;
use Livewire\Component;

class ListTickets extends Component
{

    #[Url]
    public $filter = null;

    public function render()
    {
        return view('livewire.user.ticket.list-tickets', [
            'tickets' => auth()->user()->tickets
        ]);
    }
}
