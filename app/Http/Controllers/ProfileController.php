<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // update profile info
    public function update(Request $request):RedirectResponse{
        $user=Auth::user();
        $validatedData=$request->validate([
            'name'=>'required|string',
            'email'=>'required|string|email',
            'avatar'=> 'nullable|image|mimes:jeg,jpg,png,gif|max:4096'
        ]);

        $user->name=$request->input('name');
        $user->email=$request->input('email');

        if($request->hasFile('avatar')){
            if($user->avatar){
                Storage::delete('public/'.$user->avatar);
            }
            $avatarpath=$request->file('avatar')->store('avatars','public');
            $user->avatar=$avatarpath;
        }


        $user->save();
        return redirect()->route('dashboard')->
        with('success','User data updated successfully!');
    } 
}
