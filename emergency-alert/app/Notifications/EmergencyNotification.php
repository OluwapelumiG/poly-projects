<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Emergency;

class EmergencyNotification extends Notification
{
    use Queueable;

    protected $emergency;

    /**
     * Create a new notification instance.
     */
    public function __construct(Emergency $emergency)
    {
        $this->emergency = $emergency;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable)
    {
        return ['broadcast', 'database'];
    }

    public function toArray($notifiable)
    {
        return [
            'title' => $this->emergency->title,
            'description' => $this->emergency->description,
        ];
    }
}
