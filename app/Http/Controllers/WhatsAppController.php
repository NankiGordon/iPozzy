<?php

namespace App\Http\Controllers;

use App\Services\TwilioService;
use Illuminate\Http\Request;

class WhatsAppController extends Controller
{
    protected $twilioService;

    public function __construct(TwilioService $twilioService)
    {
        $this->twilioService = $twilioService;
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'phone' => 'required|regex:/^\+?[1-9]\d{1,14}$/', // Validate phone number
            'message' => 'required|string|max:1600'
        ]);

        $this->twilioService->sendMessage($request->phone, $request->message);

        return redirect()->route('send-whatsapp');

    }
}
