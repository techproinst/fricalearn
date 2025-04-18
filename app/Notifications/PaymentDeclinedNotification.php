<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PaymentDeclinedNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(protected $data, protected $parent, protected $paymentData)
    {
        //
    }

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
        $currencySymbol = $this->paymentData->currency == 'ngn' ? '&#8358;' : '$';

        return (new MailMessage)
        ->subject('Payment Declined Notification')
        ->markdown('mails.paymentDeclined', [
            'parent' => $this->parent,
            'currencySymbol' => $currencySymbol,
            'payment' => $this->paymentData,
            'data' =>$this->data,
            'url' => route('parent.payments'),
        ]);
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
