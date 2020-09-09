<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Validator;

class ProfileController extends Controller{

    public function index(User $user){
    	
        return view('profiles.index', compact('user'));
    }

    
    public function edit(User $user){
        //$this->authorize('update', $user->id);
        return view('profiles.edit', compact('user'));
    }
    
    public function update(User $user){
        $data = request()->validate([
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'name' => ['nullable', 'string', 'max:255'],
            'lastname' => ['nullable', 'string', 'max:255'],
        ]);

        auth()->user()->update($data);
        
        return redirect("/profile/{$user->id}")->with('success','Profile updated successfully.');
    }


    /*
    public function update($user){ 
        $this->validate(request(), [
            
        ]);
        

        $user->username = request('username');
        $user->email = request('email');
        $user->name = request('name');
        $user->lastname = request('lastname');
        
        $user->save();

        return back();
    }*/
}
