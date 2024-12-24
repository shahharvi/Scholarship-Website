<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class ProfilepicController extends Controller
{
    public function updateProfilePic(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Validate image file
        ]);

        // Fetch the authenticated user's profile
        $user = Auth::user();
        $profile = $user->profile;
        // $profile = auth()->user()->profile;  // Assuming you have a one-to-one relationship between User and Profile

        // Check if the 'delete_picture' button is pressed
        if ($request->has('delete_picture') && $profile->profile_pic) {
            // Delete the old profile picture from storage
            Storage::delete('public/' . $profile->profile_pic);

            // Set the profile_pic to null in the database
            $profile->profile_pic = null;
            $profile->save();  // Save the profile after updating

            return back()->with('success', 'Profile picture deleted successfully!');
        }

        // If a new picture is uploaded
        if ($request->hasFile('profile_pic')) {
            // Delete the old picture if it exists
            if ($profile->profile_pic) {
                Storage::delete('public/' . $profile->profile_pic);
            }

            // Store the new profile picture
            $image = $request->file('profile_pic');
            $imagePath = $image->storeAs('profile_pics', time() . '.' . $image->getClientOriginalExtension(), 'public');

            // Update the profile's profile_pic in the database
            $profile->profile_pic = $imagePath;
            $profile->save();  // Save the profile after updating

            return back()->with('success', 'Profile picture updated successfully!');
        }

        return back()->with('error', 'No image selected.');
    }
}
