<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Creation_Notifications extends Notification
{
    use Queueable;




public $ID;
public $The_Modell_Name;
public $Message;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($The_Modell_Name,$ID,$Message )
    {


        $this->ID = $ID;
        $this->The_Modell_Name  = $The_Modell_Name;
        $this->Message = $Message;

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

    public function toArray($notifiable)
    {




        
        return [

            "Model_Name"=>$this->The_Modell_Name,
            "Id" =>$this->ID,
            "message" =>$this->Message,


        ];
    }
}
