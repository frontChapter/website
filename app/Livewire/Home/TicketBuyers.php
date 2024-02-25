<?php

namespace App\Livewire\Home;

use App\Models\Ticket;
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
            'buyers' => Ticket::select('tickets.email', 'tickets.first_name', 'tickets.last_name', 'tickets.user_id', 'users.username')
                ->leftJoin('users', 'user_id', 'users.id')
                ->groupBy('email', 'first_name', 'last_name', 'email', 'user_id', 'users.username')
                ->inRandomOrder()
                ->get(),
        ]);
    }
}
