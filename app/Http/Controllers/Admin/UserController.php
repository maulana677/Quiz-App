<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('roles', 'pengguna')->get();

        return view('admin.pages.user.index', compact('users'));
    }

    public function destroy(string $id)
    {
        User::find($id)->delete();
        return redirect()->back();
    }
}
