<?php


namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertyImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PropertyImageController extends Controller
{

    public function store(Request $request, $propertyId)
    {
        // Validate the image inputs
        $request->validate([
            'image_1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_5' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_6' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Find the property
        $property = Property::findOrFail($propertyId);

        // Prepare the data for storing image paths
        $imageData = [];

        // Loop through each image input field and save the image
        for ($i = 1; $i <= 6; $i++) {
            $imageField = 'image_' . $i;

            if ($request->hasFile($imageField)) {
                $image = $request->file($imageField);
                $path = $image->store('property_images', 'public');
                $imageData['image_' . $i] = $path;
            }
        }

        // If images exist, store them in the property_images table
        if (!empty($imageData)) {
            // Create a new PropertyImage record
            PropertyImage::create([
                'property_id' => $property->id,
                'image_1' => $imageData['image_1'] ?? null,
                'image_2' => $imageData['image_2'] ?? null,
                'image_3' => $imageData['image_3'] ?? null,
                'image_4' => $imageData['image_4'] ?? null,
                'image_5' => $imageData['image_5'] ?? null,
                'image_6' => $imageData['image_6'] ?? null,
            ]);
        }

        // Redirect with success message
        return redirect()->route('property.show', $propertyId)->with('success', 'Images uploaded successfully');
    }



    public function show($propertyId)
    {
        // Find the property by ID
        $property = Property::findOrFail($propertyId);

        // Retrieve associated images
        $propertyImages = PropertyImage::where('property_id', $propertyId)->first();

        // Pass the property and images to the view
        return view('property.show', compact('property', 'propertyImages'));
    }


    /**
     * Delete an image from a property.
     *
     * @param  int  $propertyId
     * @param  int  $imageNumber
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($propertyId, $imageNumber)
    {
        // Find the property
        $property = Property::findOrFail($propertyId);

        // Find the corresponding image column
        $propertyImage = PropertyImage::where('property_id', $property->id)->first();

        // Check if the image exists
        if ($propertyImage && isset($propertyImage->{'image_' . $imageNumber})) {
            // Delete the image file from storage
            $imagePath = $propertyImage->{'image_' . $imageNumber};
            if (Storage::exists('public/' . $imagePath)) {
                Storage::delete('public/' . $imagePath);
            }

            // Remove the image path from the database
            $propertyImage->{'image_' . $imageNumber} = null;
            $propertyImage->save();

            return back()->with('success', 'Image deleted successfully!');
        }

        return back()->with('error', 'Image not found.');
    }
}
