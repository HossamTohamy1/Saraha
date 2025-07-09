<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MessageNotification extends Notification
{
    use Queueable;


    public $details;
    public $Subject;
    public $FromEmail;
    public $Mailer;
    public $Message;
    /**
     * Create a new notification instance.
     */
    public function __construct($Message)
    {
        $this->details= $Message;
        $this->Message = $Message;
        $this->Subject = "New Message";
        $this->FromEmail = "Test@yousef.com";
        $this->Mailer = 'smtp';
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
    public function toMail($notifiable): MailMessage
    {
        // dd($this->Message);
        $UserName = $notifiable->name;
        $SenderName=$this->Message['sender_name']??'Anonymous';
       
        return (new MailMessage)
            ->mailer('smtp')
            ->subject($this->Subject)
            ->greeting('Hello '. $UserName)
            ->line( $this->Message["content"])
            ->line("From: ".$SenderName)
            ->line( "At: ".now());
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
