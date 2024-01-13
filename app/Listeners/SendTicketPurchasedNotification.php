<?php

namespace App\Listeners;

use App\Events\TicketPurchased;
use App\Mail\TicketPurchasedMail;
use App\Models\User;
use App\Notifications\TicketPurchasedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendTicketPurchasedNotification implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(TicketPurchased $event): void
    {
        $user = User::whereEmail($event->ticket->data->data->email)->first();

        if(!is_null($user)) {
            $user->notify(new TicketPurchasedNotification($event->ticket));
        } else {
            Mail::to($event->ticket->data->data->email)->send(new TicketPurchasedMail($event->ticket));
        }
    }
}
