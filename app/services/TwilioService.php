<?php

namespace App\Services;

use Twilio\Rest\Client;

class TwilioService
{
    protected $client;
    protected $from;

    public function __construct()
    {
        // Initialize Twilio client using SID and Auth Token
        $sid = env('TWILIO_SID');
        $authToken = env('TWILIO_AUTH_TOKEN');
        $this->client = new Client($sid, $authToken);
        $this->from = env('TWILIO_WHATSAPP_NUMBER'); // Twilio WhatsApp number
    }

    public function sendMessage($to, $message)
    {
        try {
            // Send the message using Twilio
            $this->client->messages->create(
                "whatsapp:$to", // The recipient phone number with whatsapp prefix
                [
                    'from' => $this->from, // Your Twilio WhatsApp number
                    'body' => $message
                ]
            );
        } catch (\Exception $e) {
            // Handle errors
            return 'Error: ' . $e->getMessage();
        }
    }
}
