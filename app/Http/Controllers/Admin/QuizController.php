<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quiz = Quiz::all();

        return view('admin.pages.quiz.index', compact('quiz'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.quiz.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Quiz::create($data);

        return redirect()->route('kuis.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $quiz = Quiz::find($id);
        return view('admin.pages.quiz.show', compact('quiz'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $quiz = Quiz::find($id);
        return view('admin.pages.quiz.edit', compact('quiz'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        Quiz::find($id)->update($data);

        return redirect()->route('kuis.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Quiz::find($id)->delete();
        return redirect()->route('kuis.index');
    }
}
