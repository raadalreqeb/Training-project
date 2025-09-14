<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create (){
        return view('auth.login');
    }
  
    public function store(){
        $attributes= request()->validate(
          [
            'email'=>['required' , 'email'],
        'password'=>['required']
          ]);



            
      if( ! Auth::attempt($attributes)){
         throw ValidationException::withMessages([
          'email'=>'sorry , those credentials do not match'
      ]); 
       }

       request()->session()->regenerate();

      $user = Auth::user();
  
       if ($user->role->name === 'admin') {
        return redirect('/admin/dashboard'); 
    }
       return redirect('/rooms');
    }

     public function destroy(){
        Auth::logout();
        return redirect('/');
     }
}
