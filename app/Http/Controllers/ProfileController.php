<?php
namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        // Fetch the authenticated user's profile
        $user = Auth::user();
        $profile = $user->profile;

        // Determine if the profile is complete
        $isComplete = $this->isProfileComplete($profile);

        // Update the user's profile status (for future dashboard checks)
        $user->profile_status = $isComplete ? 'complete' : 'incomplete';
        $user->save();

        return view('profile', compact('profile', 'isComplete'));
    }

    public function update(Request $request)
    {
        // Define validation rules
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
            'dob' => 'required|date',
            'age' => 'required|integer',
            'gender' => 'required|in:male,female,other',
            'caste' => 'nullable|string|max:255',
            'district' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'family_income' => 'required|string|max:255',
            'course_level' => 'required|string|max:255',
            'course_name' => 'required|string|max:255',
            'total_marks' => 'required|string|max:255',
            'obtain_marks' => 'required|string|max:255',
            'percentage' => 'required|string|max:255',
            'passing_year' => 'required|digits:4',
        ]);

        // Create or update the profile
        $profile = Profile::updateOrCreate(
            ['user_id' => Auth::id()],
            $validatedData
        );

        // Check if the profile is complete
        $isComplete = $this->isProfileComplete($profile);

        // Update the user's profile status
        Auth::user()->update([
            'profile_status' => $isComplete ? 'complete' : 'incomplete'
        ]);

        // Redirect based on update result
        return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
    }

    // Helper function to check if the profile is complete
    private function isProfileComplete($profile)
    {
        if (!$profile) {
            return false;
        }

        // List of required fields that determine if the profile is complete
        $requiredFields = [
            'first_name', 'last_name', 'email', 'phone_number', 'dob',
            'age', 'gender', 'district', 'state','family_income', 'course_level', 'course_name',
            'total_marks', 'obtain_marks', 'percentage', 'passing_year'
        ];

        // Check if any required field is missing or empty
        foreach ($requiredFields as $field) {
            if (empty($profile->$field)) {
                return false;
            }
        }

        return true;
    }
}
