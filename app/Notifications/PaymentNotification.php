<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Notifiable;
use NotificationChannels\AfricasTalking\AfricasTalkingChannel;
use NotificationChannels\AfricasTalking\AfricasTalkingMessage;

class PaymentNotification extends Notification
{
    use Queueable;

    protected $phone_number;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($phone_number)
    {
        $this->phone_number = $phone_number;
    }
    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [AfricasTalkingChannel::class];
    }
    public function toAfricasTalking($notifiable)
    {
        return (new AfricasTalkingMessage)
                    ->content('Hello World');

    }
}
