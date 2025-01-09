<?php

use App\Models\Offer;
use App\Models\Property;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\WhatsAppController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Auth\SocialController;
use Carbon\Carbon;

// Home route
use Illuminate\Support\Facades\Request;

Route::get('/', function () {
    // Check if the request is from a mobile device
    $isMobile = Request::is('mobile') || (strpos(Request::header('User-Agent'), 'Mobile') !== false);

    // Default to 4 properties per page or 1 for mobile
    $perPage = request('per_page', $isMobile ? 1 : 4);

    // Get properties with related payment data
    $properties = Property::with('payment')
        ->orderBy('created_at', 'desc')
        ->paginate($perPage);

    // Filter properties based on payment plan duration
    foreach ($properties as $property) {
        $property->offer_count = Offer::where('property_id', $property->id)->count();

        if ($property->payment) {
            // Get expiration date based on the payment plan
            $paymentPlan = $property->payment->payment_plan;
            $durationDays = 0;

            if ($paymentPlan == 'basic') {
                $durationDays = 30;
            } elseif ($paymentPlan == 'premium') {
                $durationDays = 60;
            } elseif ($paymentPlan == 'elite') {
                $durationDays = 90;
            }

            // Calculate expiration date
            $expirationDate = Carbon::parse($property->payment->created_at)->addDays($durationDays);

            // If the expiration date has passed, hide the property
            $property->is_expired = $expirationDate->isPast();
        }
    }

    return view('welcome', compact('properties'));
})->name('home');



// Dashboard route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Auth routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Property CRUD routes (resource controller)
Route::resource('property', PropertyController::class);
Route::get('/property/{id}/make-offer', [PropertyController::class, 'makeOffer'])->name('property.makeOffer');
Route::patch('/offer/{id}/updateStatus', [PropertyController::class, 'updateStatus'])->name('offer.updateStatus');
Route::post('/property/{id}/submit-offer', [PropertyController::class, 'submitOffer'])->name('property.submitOffer');
Route::patch('/property/{property}/update-availability', [PropertyController::class, 'updateAvailability'])->name('property.updateAvailability');
Route::get('/search', function () {
    $searchTerm = request('search'); // Get the search term from the query string

    $properties = Property::where('title', 'like', '%' . $searchTerm . '%')
        ->orWhere('description', 'like', '%' . $searchTerm . '%')
        ->paginate(8); // Paginate the results with 8 properties per page

    return view('welcome', compact('properties')); // Pass the filtered properties to the view
})->name('property.search');


// Logout route
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');


Route::resource('user-profiles', UserProfileController::class);



Route::get('/send-whatsapp', [WhatsAppController::class, 'sendMessage']);
Route::post('/send-whatsapp', [WhatsAppController::class, 'sendMessage']);



Route::post('/create-payment', [PaymentController::class, 'createPayment'])->name('payment.create');

Route::get('/payment-success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');
Route::get('/payment-cancel', [PaymentController::class, 'paymentCancel'])->name('payment.cancel');
Route::post('/payment-notify', [PaymentController::class, 'paymentNotify'])->name('payment.notify');



Route::get('login/google', [SocialController::class, 'redirectToGoogle']);
Route::get('callback/google', [SocialController::class, 'handleGoogleCallback']);



// Authentication routes
require __DIR__ . '/auth.php';
