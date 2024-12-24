<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    // This method will return the login view
    public function index(){
        return view('login');
    }

    // This method will authenticate the user
    public function authenticate(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8',
        ]);

        if($validator->passes()){
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $user = Auth::user();

                // Redirect based on user role
                if ($user->role === 'admin') {
                    return redirect()->route('admin.dashboard');
                } else if ($user->role === 'user') {
                    return redirect()->route('account.userdashboard');
                } else {
                    Auth::logout();
                    return redirect()->route('account.login')->withErrors(['login_error' => 'Unauthorized role.']);
                }
            } else {
                return redirect()->route('account.login')->withErrors(['login_error' => 'Invalid email or password.']);
            }
        } else {
            return redirect()->route('login')
                ->withInput()
                ->withErrors($validator);
        }
    }

    // This method will return the registration view
    public function register(){
        return view('register');
    }

    // This method will process the registration
    public function proccessregister(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            // 'phone' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        if($validator->passes()){
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'usertype' => 'user',
                // 'phone' => $request->phone,
                'password' => Hash::make($request->password),
            ]);

            if($user){
                return redirect()->route('account.login')->with('success', 'Registration successful');
            }
        } else {
            return redirect()->route('account.register')
                ->withInput()
                ->withErrors($validator);
        }
    }

    // This method will log out the user
    public function logout(){
        Auth::guard('web')->logout();
        return redirect()->route('home');
    }
}
