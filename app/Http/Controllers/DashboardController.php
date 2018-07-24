<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function adminDashboard()
    {
        $users_count = User::count();
        $student_count = User::where('type', '=', 'STUDENT')->count();
        $member_count = User::where('type', '=', 'EXECUTIVE_MEMBER')->count();
        $data = compact('users_count','student_count','member_count');
        return $data;
    }
}
