<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Scholarship;
use App\Models\Profile;

class DashboardController extends Controller
{
    // This method will return the home view
    public function homepage()
    {
        return view('home');
    }

    // This method will return the userdashboard view
    public function index()
    {
        $user = Auth::user(); // Get the authenticated user

        // Pass user data to the view
        return view('userdashboard', compact('user'));
    }

    public function fetch(Request $request)
    {
        $user = Auth::user(); // Get the authenticated user
        $profile = Profile::where('user_id', $user->id)->first();

        // Check if the user's profile status is incomplete
        if ($user->profile_status === 'incomplete' || !$profile) {
            return view('userdashboard', compact('user'));
        }

        // Fetch total scholarships count (all scholarships in the database)
        $totalScholarships = Scholarship::count();

        // Fetch scholarships based on user criteria
        $scholarships = Scholarship::where(function ($query) use ($profile) {
            if ($profile->caste) {
                $query->where(function ($subQuery) use ($profile) {
                    $subQuery->where('caste', 'LIKE', "%{$profile->caste}%")
                             ->orWhere('caste', 'All');
                });
            }

            if ($profile->course_name) {
                $query->where(function ($subQuery) use ($profile) {
                    $subQuery->where('course_name', 'LIKE', "%{$profile->course_name}%")
                             ->orWhere('course_name', 'Any');
                });
            }

            if ($profile->state) {
                $query->where(function ($subQuery) use ($profile) {
                    $subQuery->where('state', $profile->state)
                             ->orWhere('state', 'All States');
                });
            }

            if ($profile->percentage) {
                $query->where('percentage', '<=', $profile->percentage);
            }

            if ($profile->family_income) {
                $query->where('family_income', '>=', $profile->family_income);
            }
        })->get();

        // Correctly count eligible scholarships
        $eligibleScholarshipsCount = $scholarships->count();

        // Pass user data and scholarships to the view
        return view('userdashboard', compact('user', 'scholarships', 'profile', 'totalScholarships', 'eligibleScholarshipsCount'));
    }
}
