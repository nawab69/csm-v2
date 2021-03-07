<?php

namespace App\Notifications;

use App\Models\Withdraw;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WithdrawAdmin extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * @var Withdraw
     */
    protected $withdraw;

    /**
     * Create a new notification instance.
     *
     * @param Withdraw $withdraw
     */
    public function __construct(Withdraw $withdraw)
    {
        $this->withdraw = $withdraw;
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
        return (new MailMessage)->markdown('mail.withdraw.admin',['withdraw'=>$this->withdraw]);
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
