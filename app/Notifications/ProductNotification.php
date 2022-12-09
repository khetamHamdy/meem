<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ProductNotification extends Notification
{
    use Queueable;

    private $product;
    private $flag;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($product, $flag)
    {
        $this->product = $product;
        $this->flag = $flag;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
    }

    public function toDatabase()
    {

        if ($this->flag == 'true') {
            $body = sprintf(
                ' Price Change , Title :  %s , Price :  %s',
                $this->product->title,
                $this->product->price,
            );
            return [
                'title' => $this->product->title,
                'body' => $body,
                'icon' => $this->product->image,
                'url' => route('productDetails', $this->product->id),
            ];
        }

        if ($this->flag == 'false') {
            $body = sprintf(
                ' New Product , Title :  %s , Price :  %s',
                $this->product->title,
                $this->product->price,
            );
            return [
                'title' => $this->product->title,
                'body' => $body,
                'icon' => $this->product->image,
                'url' => route('productDetails', $this->product->id),
            ];
        }


    }

}
