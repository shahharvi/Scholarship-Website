<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin\LoginController as AdminLoginController;
use App\Http\Controllers\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\admin\StudentController;
use App\Http\Controllers\admin\ScholarshipController;
use App\Http\Controllers\admin\Scholarship_formController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\FetchScholarshipController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfilepicController;
use App\Http\Controllers\UserscholarshipController;


// Route for home page
Route::get('/', [DashboardController::class, 'homepage'])->name('home');

//About-us route
Route::get('/about-us', function () {return view('aboutus');})->name('aboutus');
// faq route

Route::get('/faq', function () {return view('faq');})->name('faq');


Route::get('/REGISTERED_INSTITUTES', function () {return view('REGISTERED_INSTITUTES');})->name('REGISTERED_INSTITUTES');
// User routes
Route::group(['prefix' => 'account'],
function() {

    // guest middleware
    Route::group(['middleware' => 'guest'], function()
    {
        Route::get('login', [LoginController::class, 'index'])->name('account.login');
        Route::get('register', [LoginController::class, 'register'])->name('account.register');
        Route::post('proccess-register', [LoginController::class, 'proccessregister'])->name('account.proccessregister');
        Route::post('authenticate', [LoginController::class, 'authenticate'])->name('account.authenticate');
    });

    // auth middleware
    Route::group(['middleware' => 'auth'], function()
    {
        Route::post('logout', [LoginController::class, 'logout'])->name('account.logout');
        Route::get('logout', [LoginController::class, 'logout'])->name('account.logout');
        Route::get('/userdashboard', [DashboardController::class, 'fetch'])->name('account.userdashboard');
        Route::get('/ChangePassword', [PasswordController::class, 'showChangePasswordForm'])->name('password.change');
        Route::post('/ChangePassword', [PasswordController::class, 'changePassword'])->name('password.update');
    });

}
);


// Admin routes
Route::group(['prefix' => 'admin'],
 function(){

    // authenticated middleware for admin
    Route::group(['middleware' => 'admin.auth'], function() {
        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::post('logout',[AdminLoginController::class, 'logout'])->name('admin.logout');
        Route::get('studentmaster', [StudentController::class, 'index'])->name('admin.studentmaster');
        Route::get('scholarshipmaster',[ScholarshipController::class, 'index'])->name('admin.scholarshipmaster');
        Route::get('scholarship_form',[Scholarship_formController::class, 'index'])->name('admin.scholarship_form');
        Route::post('scholarship_form',[Scholarship_formController::class, 'add'])->name('admin.addscholarship');
        Route::get('scholarship/edit/{id}', [ScholarshipController::class, 'edit'])->name('admin.scholarship_edit');
        Route::put('scholarship/update/{id}', [ScholarshipController::class, 'update'])->name('admin.scholarship_update');
        Route::delete('scholarship/delete/{id}', [ScholarshipController::class, 'delete'])->name('admin.scholarship_delete');

    });
}
);



Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        // Check if the profile is incomplete
        if (Auth::user()->profile_status == 'incomplete') {
            return redirect()->route('profile.show')->with('error', 'Please complete your profile.');
        }

        // Otherwise, show the dashboard
        return view('dashboard');
    });

    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/update-pic', [ProfilepicController::class, 'updateProfilePic'])->name('profile.update.pic');
    Route::get('/feedback', [FeedbackController::class, 'showForm'])->name('feedback.form');
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
    Route::get('/scholarship/{id}', [UserscholarshipController::class, 'showscholarship'])->name('scholarshipdetail');
    Route::get('/search-and-apply', [PageController::class,'allscholarship'])->name('searchandapply');


});
