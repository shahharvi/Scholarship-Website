<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{

    // public function index() {
    //     $user = Auth::user();
    //     return view('admin.dashboard', compact('user'));
    // }

    public function index() {
        $user = Auth::user();
        $loginsPerMonth = DB::table('users')
        ->select(
            DB::raw("DATE_FORMAT(updated_at, '%M %Y') as month"),
            DB::raw("COUNT(*) as login_count")
        )
        ->whereNotNull('updated_at') // Ensure last_login is not null
        ->groupBy('month')
        ->orderBy(DB::raw("MIN(updated_at)"), 'asc') // Order by earliest date in each month
        ->get();

    return view('admin.dashboard', compact('loginsPerMonth'));

    }




}
