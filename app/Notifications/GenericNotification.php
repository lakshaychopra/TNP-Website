<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use NotificationChannels\OneSignal\OneSignalChannel;
use NotificationChannels\OneSignal\OneSignalMessage;
use NotificationChannels\OneSignal\OneSignalWebButton;
use App\Models\Post;

class GenericNotification extends Notification
{
    use Queueable;
    private $data;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [OneSignalChannel::class];
    }


    public function toWebPush($notifiable, $notification)
    {
      $time = \Carbon\Carbon::now();
      return OneSignalMessage::create()
      ->subject($data->title)
      ->body("Click here to see details.")
      ->url('https://www.tnpgndec.com')
      ->webButton(
          OneSignalWebButton::create('link-1')
              ->text('Home')
              ->url('https://www.tnpgndec.com')
      )
      ->webButton(
        OneSignalWebButton::create('link-2')
            ->text('About')
            ->url('https://www.tnpgndec.com/about')
    );
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
