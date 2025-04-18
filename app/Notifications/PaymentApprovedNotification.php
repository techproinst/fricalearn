<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PaymentApprovedNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(protected $parent, protected $paymentData)
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
            ->subject('Payment Approval Notification')
            ->markdown('mails.paymentApproval', [
                'parent' => $this->parent,
                'currencySymbol' => $currencySymbol,
                'payment' => $this->paymentData,
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
