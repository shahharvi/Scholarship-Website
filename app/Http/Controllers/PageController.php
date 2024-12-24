<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use App\Models\Scholarship;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Profile;

class PageController extends Controller
{



    // public function allscholarship(Request $request)
    // {
    //     $user = Auth::user(); // Get the authenticated user
    //     $profile = Profile::where('user_id', $user->id)->first();

    //     // Fetch scholarships based on user criteria
    //     $scholarships = Scholarship::where(function ($query) use ($user) {
    //         $profile = $user->profile; // Access the profile

    //         // Perform null checks before adding conditions to the query
    //         if ($profile->caste) {
    //             $query->where('caste', 'LIKE', "%{$profile->caste}%")
    //                 ->orWhere('caste', 'All');
    //         }

    //         if ($profile->course_name) {
    //             $query->where('course_name', 'LIKE', "%{$profile->course_name}%")
    //                 ->orWhere('caste', 'Any');
    //         }

    //         if ($profile->state) {
    //             $query->where('state', $profile->state) // Exact match for state
    //                 ->orWhere('caste', 'All States');
    //         }

    //         if ($profile->percentage) {
    //             $query->where('percentage', '<=', $profile->percentage); // Percentage check
    //         }

    //         if ($profile->family_income) {
    //             $query->where('family_income', '>=', $profile->family_income); // Family income check
    //         }
    //     })->get();

    //     // Pass user data and scholarships to the view

    // return view('searchAndApply', compact('user', 'scholarships', 'profile'));
    // }

    public function allscholarship(Request $request)
{
    $user = Auth::user(); // Get the authenticated user
    $profile = Profile::where('user_id', $user->id)->first();

    // Ensure the user has completed their profile
    if (!$profile) {
        return redirect()->back()->with('error', 'Please complete your profile to view scholarships.');
    }

    // Get the search query from the request
    $searchQuery = $request->input('query');


    // Build the query for eligible scholarships
    $scholarshipsQuery = Scholarship::query();

    $scholarshipsQuery->where(function ($queryBuilder) use ($profile) {
        // Filter by caste
        $queryBuilder->where(function ($query) use ($profile) {
            $query->where('caste', 'LIKE', "%{$profile->caste}%")
                  ->orWhere('caste', 'All');
        });

        // Filter by course name
        $queryBuilder->where(function ($query) use ($profile) {
            $query->where('course_name', 'LIKE', "%{$profile->course_name}%")
                  ->orWhere('course_name', 'Any');
        });

        // Filter by state
        $queryBuilder->where(function ($query) use ($profile) {
            $query->where('state', $profile->state)
                  ->orWhere('state', 'All States');
        });

        // Filter by percentage eligibility
        if ($profile->percentage) {
            $queryBuilder->where('percentage', '<=', $profile->percentage);
        }

        // Filter by family income eligibility
        if ($profile->family_income) {
            $queryBuilder->where('family_income', '>=', $profile->family_income);
        }
    });

    // Add search functionality (search within eligible scholarships)
    if ($searchQuery) {
        $scholarshipsQuery->where('sname', 'LIKE', "%{$searchQuery}%");
    }

    // Execute the query to fetch eligible scholarships
    $scholarships = $scholarshipsQuery->get();
    // $eligibleScholarshipsCount = $scholarships->count();

    // Return the scholarships list to the view
    return view('searchAndApply', compact('scholarships', 'profile'));
}


}

?>
