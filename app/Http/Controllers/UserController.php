<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function show()
    {
        return view('user');
    }


    public function update(Request $request)
    {

        $validateData = $request->validate([
            'name' => 'min:3|unique:users,name,'.auth()->user()->id,
            'email' => 'email:rfc,dns|unique:users,email,'.auth()->user()->id
        ]);

        $user = User::find(auth()->user()->id);

        $user->update($validateData);


        return redirect(route('profile.show'))->with('success','Profile Successfully Updated !');
    }

    public function editPassword()
    {
        return view('password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed'

        ]);

        if(Hash::check($request->current_password,Auth::user()->password)) {
            $user = User::find(auth()->user()->id);
            $user->update(['password' => Hash::make($request->password)]); //bcrypt yo sabi


            return redirect(route('profile.show'))->with('pass_changed','Password Successfully Changed !');
        }else {
            throw ValidationException::withMessages([
                'current_password' => 'Your current password does not match with our record'
            ]);
        }


    }

}
