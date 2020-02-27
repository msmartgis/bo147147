<?php

namespace App\Notifications;

use App\Courrier;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class CourrierAdded extends Notification
{
    use Queueable;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user,$action,$element_type,$element_id,$message)
    {
        $this->user = $user;
        $this->action = $action;
        $this->element_type = $element_type;
        $this->element_id = $element_id;
        $this->message = $message;
        
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {        
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    // public function toMail($notifiable)
    // {
    //     return (new MailMessage)
    //                 ->line('Un nouveau courrier ajouté.')
    //                 ->action('Voir le nouveau courrier', url('/'))
    //                 ->line('Thank you for using our application!');
    // }

    public function toDatabase()
    {
        return [

            'user' => $this->user,
            'action' => $this->action,
            'element_type' => $this->element_type,
            'element_id' => $this->element_id,
        ]; 
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
