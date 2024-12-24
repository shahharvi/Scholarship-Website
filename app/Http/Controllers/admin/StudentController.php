<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{

    public function index()
      {
        $user = Auth::user();
        // Fetch all students from the database
         $users = User::where('role', '!=', 'admin')->get();

         // Pass the students data to the view
         return view('admin.studentmaster', compact('users','user'));
 }
}
