<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class  GoogleController extends Controller{

   public function redirectToGoogle(){

    return Socialite::driver('google')->redirect();
  
   }

 public function  handleGoogleCallback(){

    
    try{
    
    $googleUser = Socialite::driver('google')->user();
  
     $user =User::where('google_id' , $googleUser->getId())->first();


     if(!$user){


        $existingUser  =User::where('email' , $googleUser->getEmail())->first();
     

        if($existingUser){
             $existingUser->update([
                        'google_id' => $googleUser->getId(),
                    ]);
                    $user = $existingUser;
        }else{
            $user= User::create([
                 'first_name' => $googleUser->user['given_name'] ?? 'Unknown',
                        'last_name' => $googleUser->user['family_name'] ?? '',
                        'email' => $googleUser->getEmail(),
                        'google_id' => $googleUser->getId(),
                        'email_verified_at' => now(),
                        'password' => bcrypt(Str::random(16)), // random password
                        'avatar' => $googleUser->getAvatar(),
                        'role_id' => 2, // default role (user)
            ]);
        }
     }
     

      Auth::login($user); 
      return redirect('/');}
      catch(\Exception $e){
        return redirect('/login')->withErrors(['msg' => 'Google login failed.']);
      }
 }
}








