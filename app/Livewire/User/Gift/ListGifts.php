<?php

namespace App\Livewire\User\Gift;

use App\Models\Ticket;
use Livewire\Component;

class ListGifts extends Component
{
    public function render()
    {
        return view('livewire.user.gift.list-gifts', [
            'tickets' => auth()->user()->tickets()
                ->whereIn('ticket_id', ['275714', '275952'])
                ->select(['ticket_id', 'code'])
                ->get(),
            'gifts' => auth()->user()->gifts,
        ]);
    }
}
