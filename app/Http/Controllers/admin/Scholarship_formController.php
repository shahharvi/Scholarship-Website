<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Scholarship;
use Illuminate\Http\Request;

class Scholarship_formController extends Controller
{
    //
    public function index()
    {
        return view('admin.scholarship_form');
    }
    public function add(Request $request)
{
    // Validate the incoming request
    $validatedData = $request->validate([
        'sname' => 'required|string|max:255',
        'description' => 'required|string',
        // 'eligibility' => 'required|string',
        'caste' => 'nullable|string',
        'amount' => 'nullable|string',
        'percentage' => 'required|numeric',
        's_provider' => 'required|string',
        'provider_name' => 'required|string',
        'start_date' => 'required|date',
        'end_date' => 'required|date',
        'state' => 'nullable|string',
        'family_income' => 'nullable|numeric',
        'course_level' => 'nullable|string',
        'course_name' => 'nullable|string',
        'Scholarship_link' => 'required|string',
    ]);

    // Insert data into the scholarships table
    $scholarship = new Scholarship;
    $scholarship->sname = $validatedData['sname'];
    $scholarship->description = $validatedData['description'];
    // $scholarship->eligibility = $validatedData['eligibility'];
    $scholarship->caste = $validatedData['caste'] ?? null;
    $scholarship->percentage = $validatedData['percentage'];
    $scholarship->amount = $validatedData['amount'];
    $scholarship->s_provider = $validatedData['s_provider'];
    $scholarship->provider_name = $validatedData['provider_name'];
    $scholarship->start_date = $validatedData['start_date'];
    $scholarship->state = $validatedData['state'];
    $scholarship->family_income = $validatedData['family_income'];
    $scholarship->course_level = $validatedData['course_level'];
    $scholarship->course_name= $validatedData['course_name'];
    $scholarship->end_date = $validatedData['end_date'];
    $scholarship->created_at = now();
    $scholarship->updated_at = now();
    $scholarship->save();
    $scholarship->Scholarship_link= $validatedData['Scholarship_link'];

    return redirect()->route('admin.scholarshipmaster')->with('success', 'Scholarship created successfully');
}

}
