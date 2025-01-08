<?php

return [
    'merchant_id' => env('PAYFAST_MERCHANT_ID'),
    'merchant_key' => env('PAYFAST_MERCHANT_KEY'),
    'url' => env('PAYFAST_TEST_MODE', false)
        ? 'https://sandbox.payfast.co.za/eng/process'
        : 'https://www.payfast.co.za/eng/process',  // Use sandbox URL if in test mode
    'return_url' => env('PAYFAST_RETURN_URL'),
    'cancel_url' => env('PAYFAST_CANCEL_URL'),
    'notify_url' => env('PAYFAST_NOTIFY_URL'),

    'sandbox' => env('PAYFAST_TEST_MODE', true),  // Set to true for test mode
];
