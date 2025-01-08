<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class PaymentController extends Controller
{
    // Available payment plans
    private $plans = [
        'basic' => ['amount' => 50, 'name' => 'Basic Plan', 'description' => 'Basic Plan Description'],
        'premium' => ['amount' => 100, 'name' => 'Premium Plan', 'description' => 'Premium Plan Description'],
        'elite' => ['amount' => 200, 'name' => 'Elite Plan', 'description' => 'Elite Plan Description'],
    ];

    public function createPayment(Request $request)
    {
        // Get the payment plan from the request
        $paymentPlan = $request->payment_plan;

        // Check if the selected plan exists
        if (!array_key_exists($paymentPlan, $this->plans)) {
            return redirect()->back()->with('error', 'Invalid payment plan selected');
        }

        // Get the selected plan details
        $selectedPlan = $this->plans[$paymentPlan];

        // Get the email address from the authenticated user
        $emailAddress = auth()->user()->email;

        // Save payment details to the database
        $payment = new Payment([
            'user_id' => auth()->id(),
            'payment_plan' => $paymentPlan,
            'amount' => $selectedPlan['amount'],
            'status' => 'pending',
        ]);
        $payment->save();

        // Prepare payment data for PayFast
        $paymentData = [
            'merchant_id' => config('payfast.merchant_id'),
            'merchant_key' => config('payfast.merchant_key'),
            'return_url' => route('payment.success'), // Success route
            'cancel_url' => route('payment.cancel'), // Cancel route
            'notify_url' => route('payment.notify'), // Notify route
            'amount' => $selectedPlan['amount'],
            'item_name' => $selectedPlan['name'],
            'item_description' => $selectedPlan['description'],
            'email_address' => $emailAddress,
        ];

        // Generate PayFast URL
        $payfastUrl = config('payfast.url') . '?' . http_build_query($paymentData);

        // Log the payment data and generated URL for debugging
        Log::info('Generated PayFast URL: ' . $payfastUrl);

        // Redirect to PayFast for payment processing
        return redirect()->to($payfastUrl);
    }

    public function paymentNotify(Request $request)
    {
        $payfastData = $request->all();

        // Process payment notification (you can add additional verification if needed)
        Log::info('Payment notification received: ', $payfastData);

        // Verify and update the payment status
        $payment = Payment::where('id', $payfastData['payment_reference'])->first();
        if ($payment && $payfastData['payment_status'] == 'COMPLETE') {
            // Update the payment status to completed
            $payment->status = 'completed';
            $payment->save();

            // Redirect to the create property page
            return redirect()->route('property.create');
        }

        // If payment was not successful, redirect to the cancel page
        return redirect()->route('payment.cancel');
    }

    public function paymentSuccess()
    {
        // You can also return a success view here if needed
        return view('payment.success');
    }

    public function paymentCancel()
    {
        return view('payment.cancel');
    }
}
