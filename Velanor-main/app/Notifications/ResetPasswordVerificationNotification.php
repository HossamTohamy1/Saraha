<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Ichtrojan\Otp\Otp;
class ResetPasswordVerificationNotification extends Notification
{
    use Queueable;
    public $Message;
    public $Subject;
    public $FromEmail;
    public $Mailer;
    private $OTP;
    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        $this->Message="Reset password verification code is: ";
        $this->Subject="Reset password verification ";
        $this->FromEmail="Test@yousef.com";
        $this->Mailer='smtp';
        $this->OTP=new OTP;
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
        $otp=$this->OTP->generate($notifiable->email,'numeric',6,20);
        return (new MailMessage)
        ->mailer('smtp')
        ->subject($this->Subject)
        ->greeting('Hello '. $notifiable->name)
        ->line($this->Message)
        ->line( $otp->token);
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
