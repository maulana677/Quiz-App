<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index()
    {
        $quiz_count = Quiz::count();
        $user_count = User::where('roles', 'pengguna')->count();
        return view('admin.pages.dashboard', compact('quiz_count', 'user_count'));
    }
}
