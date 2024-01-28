<?php

namespace App\Notifications;

use App\Models\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;

class TicketPurchasedNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(
        public Ticket $ticket,
    ) {}

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage())
            ->subject(Lang::get('Ticket purchased'))
            ->line(Lang::get('Deer :name,', ['name' => $notifiable->name]))
            ->line(Lang::get('We are very happy that you have joined the participants of the biggest front-end conference in Iran.'))
            ->line(Lang::get('We are impatiently waiting for your warm presence on the 29th day of February in the beautiful city of Amol.'))
            ->line(Lang::get('You can follow the complete ticket information through the link below :)'))
            ->action(Lang::get('My tickets'), route('ticket'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
