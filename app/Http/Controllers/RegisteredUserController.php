<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;


class RegisteredUserController extends Controller
{
    //

    public function create(){
        return view('auth.register');
    }


    public function store(){


     
        $validated = request()->validate([
          'first_name'=>['required'],
          'last_name'=>['required'],
          'email'=>['required' , 'email' , 'max:255'],
          'password'=>['required' , Password::min(6) , 'confirmed'],
          'phone'=>['required'],
          


        ]);

   $validated['role_id'] = 2;
   $validated['password'] = bcrypt($validated['password']);

        $user = User::create($validated);
         Auth::login($user);
         return redirect('/rooms');
    }
}
