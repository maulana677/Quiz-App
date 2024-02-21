<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $quizzes = Quiz::orderBy('id', 'desc')->get();
        return view('frontend.layouts.homepage', compact('quizzes'));
    }

    public function detail($id)
    {
        $quiz = Quiz::find($id);
        return view('frontend.home.detail', compact('quiz'));
    }
}
