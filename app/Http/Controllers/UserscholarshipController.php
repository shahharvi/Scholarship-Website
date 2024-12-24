<?php

namespace App\Http\Controllers;

use App\Models\Scholarship;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Profile;

class UserscholarshipController extends Controller
{
    //show more details about the scholarship avilable for the student
    public function showscholarship($id)
    {
        // Find the scholarship by its ID
        $scholarship = Scholarship::findOrFail($id);

        // Pass the scholarship to the view
        return view('scholarshipdetail', compact('scholarship'));
    }


}
