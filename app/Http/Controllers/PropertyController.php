<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Property;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Notification;
use App\Notifications\OfferMade;

class PropertyController extends Controller
{
    // Show all properties
    public function index()
    {
        // Retrieve all properties and profiles for all users
        $properties = Property::with('payment') // Eager load payments for each property
            ->orderBy('created_at', 'desc')
            ->paginate(8); // Order by latest and paginate

        $userProfiles = UserProfile::with('user')->get(); // Get all user profiles with associated user

        // Add expiration date logic based on the payment plan
        foreach ($properties as $property) {
            if ($property->payment) {
                $paymentPlan = $property->payment->payment_plan;
                $createdAt = $property->payment->created_at;

                // Set expiration based on the plan
                switch ($paymentPlan) {
                    case 'basic':
                        $property->payment->expiration_date = $createdAt->addDays(30); // Basic plan expires in 30 days
                        break;
                    case 'premium':
                        $property->payment->expiration_date = $createdAt->addDays(60); // Premium plan expires in 60 days
                        break;
                    case 'elite':
                        $property->payment->expiration_date = $createdAt->addDays(90); // Elite plan expires in 90 days
                        break;
                    default:
                        $property->payment->expiration_date = null; // No expiration
                        break;
                }
            }
        }

        // Pass both properties and userProfiles to the view
        return view('property.index', compact('properties', 'userProfiles'));
    }



    // Show the form to create a new property
    public function create()
    {
        return view('property.create');
    }

    // Store a new property
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'bedrooms' => 'required|numeric',
            'bathrooms' => 'required|numeric',
            'garage' => 'required|numeric',
            'room_type' => 'required|string',
            'amenities' => 'array|nullable', // Validate amenities as an array
            'amenities.*' => 'string', // Ensure each item in amenities is a string
            'available_date' => 'required|date',
            'image_1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_5' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_6' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $property = Property::create([
            'title' => $request->title,
            'province' => $request->province,
            'description' => $request->description,
            'price' => $request->price,
            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'garage' => $request->garage,
            'room_type' => $request->room_type,
            'amenities' => $request->amenities ?? [], // Store amenities as an array
            'available_date' => $request->available_date,
            'user_id' => auth()->id(),
        ]);

        $imagePaths = [];
        foreach (range(1, 6) as $index) {
            $imageField = "image_$index";
            if ($request->hasFile($imageField)) {
                $imagePaths[$imageField] = $request->file($imageField)->store('properties', 'public');
            }
        }
        $property->update($imagePaths);

        return redirect()->route('home')->with('success', 'Property added successfully!');
    }

    public function makeOffer($id)
    {
        // Retrieve the property by ID
        $property = Property::findOrFail($id);

        // Paginate the offers for the property (4 per page) and order them by created_at in descending order
        $offers = Offer::where('property_id', $id)
            ->orderBy('created_at', 'desc') // Order by the latest offers first
            ->paginate(2); // Paginate with 4 offers per page

        // Return the view with the property and offers
        return view('property.makeOffer', compact('property', 'offers'));
    }





    public function submitOffer(Request $request, $propertyId)
    {
        // Validate the input
        $request->validate([
            'offer_price' => 'required|numeric',
            'message' => 'nullable|string',
            'phone_number' => 'required|numeric', // Validate phone number
        ]);

        // Retrieve the property by ID
        $property = Property::findOrFail($propertyId);

        // Create a new offer and save the details
        $offer = new Offer();
        $offer->property_id = $property->id;
        $offer->user_id = auth()->id(); // Assuming the user is authenticated
        $offer->price = $request->offer_price;
        $offer->message = $request->message;
        $offer->phone_number = $request->phone_number; // Save the phone number
        $offer->status = 'Pending'; // Set the initial status of the offer
        $offer->save();

        // Retrieve the property owner (single user) by accessing the first user in the collection
        $propertyOwner = $property->user()->first(); // Retrieve the first user instance (as a single user)

        // Send the notification to the property owner
        Notification::send($propertyOwner, new OfferMade($offer, $property->first()));

        // Redirect or return response
        return redirect()->route('property.show', $property->id)
            ->with('success', 'Offer submitted successfully!');
    }

    public function updateStatus(Request $request, $id)
    {
        // Validate the input
        $request->validate([
            'status' => 'required|in:Pending,Accepted,Rejected',
        ]);

        // Retrieve the offer by ID
        $offer = Offer::findOrFail($id);

        // Check if the authenticated user is the owner of the property
        if (auth()->id() !== $offer->property->user_id) {
            abort(403, 'Unauthorized action.');
        }

        // Update the offer status
        $offer->status = $request->status;
        $offer->save();

        return redirect()->route('property.show', $offer->property_id)
            ->with('success', 'Offer status updated successfully!');
    }

    public function updateAvailability(Request $request, $id)
    {
        // Validate the availability input
        $request->validate([
            'availability' => 'required|in:Available,Taken',
        ]);

        // Find the property
        $property = Property::findOrFail($id);

        // Update the availability
        $property->availability = $request->availability;
        $property->save();

        // Redirect back with a success message
        return redirect()->route('property.show', $property->id)
            ->with('success', 'Property availability updated successfully!');
    }




    // Show a specific property
    public function show($id)
    {
        // Load the property along with its related offers (sorted by latest offer first) and user profile
        $property = Property::with([
            'offers' => function ($query) {
                $query->latest(); // Orders offers by the latest created date (or by any column you specify)
            },
            'user.profile'
        ])->findOrFail($id);

        // Fetch the offers for the property
        $offers = $property->offers;

        // Pass the data to the view
        return view('property.show', compact('property', 'offers'));
    }







    // Show the form to edit a property
    public function edit($id)
    {
        // Retrieve the property by ID
        $property = Property::findOrFail($id);

        // Pass the property data to the view
        return view('property.edit', compact('property'));
    }


    // Update a specific property
    public function update(Request $request, $id)
    {
        // Validate input data
        $request->validate([
            'title' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'bedrooms' => 'required|numeric',
            'bathrooms' => 'required|numeric',
            'garage' => 'required|numeric',
            'room_type' => 'required|string',
            'amenities' => 'array|nullable', // Ensure amenities is validated as an array
            'available_date' => 'required|date',
            'image_1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_5' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_6' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Find the property by ID
        $property = Property::findOrFail($id);

        // Update the property details
        $property->update([
            'title' => $request->title,
            'province' => $request->province,
            'description' => $request->description,
            'price' => $request->price,
            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'garage' => $request->garage,
            'room_type' => $request->room_type,
            'amenities' => $request->amenities ?? [], // Store amenities as an array, or an empty array if null
            'available_date' => $request->available_date,
        ]);

        // Handle image uploads
        foreach (range(1, 6) as $index) {
            $imageField = "image_$index";
            if ($request->hasFile($imageField)) {
                // Delete the old image if it exists
                if ($property->$imageField) {
                    Storage::disk('public')->delete($property->$imageField);
                }
                // Store the new image
                $property->$imageField = $request->file($imageField)->store('properties', 'public');
            }
        }

        // Save the property updates
        $property->save();

        // Redirect with success message
        return redirect()->route('property.index')->with('success', 'Property updated successfully!');
    }





    // Delete a property
    public function destroy($id)
    {
        $property = Property::findOrFail($id);

        foreach (range(1, 6) as $index) {
            $imageField = "image_$index";
            if ($property->$imageField) {
                Storage::disk('public')->delete($property->$imageField);
            }
        }

        $property->delete();

        return redirect()->route('property.index')->with('success', 'Property deleted successfully!');
    }
}
