<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    // Show feedback form
    public function showForm()
    {
        return view('feedback-form');
    }

    // Store feedback
    public function store(Request $request)
    {
        $request->validate([
            'feedback_type' => 'required|string',
            'message' => 'required|string',
        ]);

        // Save feedback to database
        $feedback = new Feedback();
        $feedback->name = Auth::user()->name; // Retrieve name from the authenticated user
        $feedback->email = Auth::user()->email; // Retrieve email from the authenticated user
        $feedback->feedback_type = $request->feedback_type;
        $feedback->message = $request->message;
        $feedback->save();

        // Redirect back with success message
        return redirect()->route('feedback.form')->with('success', 'Thank you for your feedback!');
    }
}
