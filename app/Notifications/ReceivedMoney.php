<?php

namespace App\Notifications;

use App\Models\Receive;
use App\Models\Send;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReceivedMoney extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * @var Send
     */
    protected $send;
    /**
     * @var Receive
     */
    protected $receive;

    /**
     * Create a new notification instance.
     *
     * @param Send $send
     * @param Receive $receive
     */
    public function __construct(Send $send,Receive $receive)
    {
        $this->send = $send;
        $this->receive = $receive;
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
     * @return MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)->markdown('mail.received.money',['send'=>$this->send,'receive'=>$this->receive]);
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
