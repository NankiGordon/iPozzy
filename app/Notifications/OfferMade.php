<?php

namespace App\Notifications;

use App\Models\Offer;
use App\Models\Property;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OfferMade extends Notification
{
    use Queueable;

    protected $offer;
    protected $property;

    public function __construct(Offer $offer, Property $property)
    {
        $this->offer = $offer;
        $this->property = $property;
    }

    public function via($notifiable)
    {
        return ['mail']; // Send via email
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('An offer has been made for your property: ' . $this->property->title)
            ->line('Offer Price: ' . $this->offer->price)
            ->line('Message: ' . ($this->offer->message ?: 'No message provided'))
            ->line('Phone Number: ' . $this->offer->phone_number)
            ->action('View Offer', route('property.show', $this->property->id))
            ->line('Thank you for using our platform!');
    }
}
