<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    // register
    public function store(Request $request)
    {
        $validatedData =  $request->validate([
            'name' => 'required|max:255|min:5|unique:users',
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'required|min:8|max:30'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        return redirect(route('login.index'))->with('success', 'Registration was successful!');

    }
}
