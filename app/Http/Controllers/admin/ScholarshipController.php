<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Scholarship;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ScholarshipController extends Controller
{
    //
    public function index()
      {
        // Fetch all students from the database
         $scholarships = Scholarship::all();
         $user = Auth::user();
         // Pass the students data to the view
         return view('admin.scholarshipmaster', compact('scholarships','user'));
 }

//  for editing the scholarship
  public function edit($id)
  {
      // Find a student with a given id and return the view
      $scholarship = Scholarship::find($id);
      return view('admin.scholarship_edit', compact('scholarship'));
  }


  // for updating the scholarship
  public function update(Request $request, $id)
{
    $scholarship = Scholarship::find($id);

    if (!$scholarship) {
        return redirect()->route('admin.scholarshipmaster')->with('error', 'Scholarship not found');
    }

    $validatedData =$request->validate([
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


    // Find the scholarship by ID
    $scholarship = Scholarship::findOrFail($id);

    // Update the scholarship's data
    $scholarship->sname = $validatedData['sname'];
    $scholarship->description = $validatedData['description'];
    $scholarship->caste = $validatedData['caste'] ?? null;
    $scholarship->percentage = $validatedData['percentage'];
    $scholarship->amount = $validatedData['amount'];
    $scholarship->s_provider = $validatedData['s_provider'];
    $scholarship->provider_name = $validatedData['provider_name'];
    $scholarship->start_date = $validatedData['start_date'];
    $scholarship->end_date = $validatedData['end_date'];
    $scholarship->state = $validatedData['state'];
    $scholarship->family_income = $validatedData['family_income'];
    $scholarship->course_level = $validatedData['course_level'];
    $scholarship->course_name = $validatedData['course_name'];
    $scholarship->Scholarship_link = $validatedData['Scholarship_link'];
    $scholarship->updated_at = now(); // Set the updated timestamp
    $scholarship->save();


    return redirect()->route('admin.scholarshipmaster')->with('success', 'Scholarship updated successfully');
}

// for deleting the scholarship
  public function delete($id)
  {
      // Find a student with a given id and delete
      $scholarship = Scholarship::find($id);
      $scholarship->delete();
      return redirect()->route('admin.scholarshipmaster');
  }
}
