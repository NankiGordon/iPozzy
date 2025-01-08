<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserProfileController extends Controller
{
    // Display a listing of the user profiles
    public function index()
    {
        // Eager load the 'user' relationship to access email
        $profiles = UserProfile::with('user')->get();

        return view('user-profiles.index', compact('profiles'));
    }

    // Show the form for creating a new profile
    public function create()
    {
        return view('user-profiles.create');
    }

    // Store a newly created profile in storage
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:255',
            'address_line_1' => 'required|string|max:255',
            'address_line_2' => 'nullable|string|max:255',
            'town' => 'nullable|string|max:255',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle the profile picture upload if exists
        if ($request->hasFile('profile_pic')) {
            $validated['profile_pic'] = $request->file('profile_pic')->store('profile_pictures', 'public');
        }

        // Adding the authenticated user's ID as the user_id (foreign key)
        $validated['user_id'] = Auth::id();

        UserProfile::create($validated);

        return redirect()->route('user-profiles.index');
    }

    // Display the specified profile
    public function show($id)
    {
        $profile = UserProfile::findOrFail($id);
        return view('user-profiles.show', compact('profile'));
    }

    // Show the form for editing the specified profile
    public function edit($id)
    {
        $profile = UserProfile::findOrFail($id);
        return view('user-profiles.edit', compact('profile'));
    }

    // Update the specified profile in storage
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:255',
            'address_line_1' => 'required|string|max:255',
            'address_line_2' => 'nullable|string|max:255',
            'town' => 'nullable|string|max:255',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle the profile picture upload if exists
        if ($request->hasFile('profile_pic')) {
            $validated['profile_pic'] = $request->file('profile_pic')->store('profile_pictures', 'public');
        }

        $profile = UserProfile::findOrFail($id);
        $profile->update($validated);

        return redirect()->route('user-profiles.index');
    }

    // Remove the specified profile from storage
    public function destroy($id)
    {
        $profile = UserProfile::findOrFail($id);

        // Delete associated profile picture if exists
        if ($profile->profile_pic) {
            Storage::disk('public')->delete($profile->profile_pic);
        }

        // Delete the profile
        $profile->delete();

        return redirect()->route('user-profiles.index')->with('success', 'Profile deleted successfully');
    }

}
