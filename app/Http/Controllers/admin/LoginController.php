<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    // This method will return the login view for admin
    public function index()
    {
        return view('admin.login');
    }

    // This method will authenticate the admin
    public function authenticate(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8',
        ]);

        if($validator->passes()){
            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
                if (Auth::guard('admin')->user()->role != 'admin') { // Ensure the role check is correct
                    Auth::guard('admin')->logout();
                    return redirect()->route('admin.login')
                        ->withErrors(['login_error' => 'You are not authorized to login as admin']);
                }
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('admin.login')
                    ->withErrors(['login_error' => 'Either email or password is incorrect']);
            }
        } else {
            return redirect()->route('admin.login')
                ->withInput()
                ->withErrors($validator);
        }
    }
    // This method will logout admin user

    public function logout() {
        Auth::guard('admin')->logout();
        Session::flush();
        return redirect()->route('home');
    }
}
