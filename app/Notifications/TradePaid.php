<?php

namespace App\Notifications;

use App\Models\Trade;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TradePaid extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * @var Trade
     */
    protected $trade;

    /**
     * Create a new notification instance.
     *
     * @param Trade $trade
     */
    public function __construct(Trade $trade)
    {
        $this->trade = $trade;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)->markdown('mail.offers.paid',['trade'=>$this->trade]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
