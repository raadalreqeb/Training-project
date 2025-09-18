<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class ProfileController extends Controller
{
    //

       public function show()
    {
            
           $user = Auth::user();
        return view('profile.show', compact('user'));
    }


        public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }


public function update(Request $request)
{
    /** @var \App\Models\User $user */
    $user = Auth::user();

 $validated = $request->validate([
    'first_name' => ['required', 'string', 'max:255'],
    'last_name'  => ['required', 'string', 'max:255'],
    'email' => [
        'required',
        'email',
        'max:255',
        Rule::unique('users')->ignore($user->user_id, 'user_id')
    ],
]);

    $user->update($validated);

    return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
}
}
