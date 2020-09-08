<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller{

    public function index($user){
    	$userToShow = User::find($user);
        return view('home', [ "user" => $userToShow, ]);
    }

    public function edit($user){
    	$userToEdit = Auth::user();
        return view('home', [ "user" => $userToEdit, ]);
    }

    public function update($user){ 
        $this->validate(request(), [
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'name' => ['nullable', 'string', 'max:255'],
            'lastname' => ['nullable', 'string', 'max:255']
        ]);

        $user->username = request('username');
        $user->email = request('email');
        $user->name = request('name');
        $user->lastname = request('lastname');
        
        $user->save();

        return back();
    }
}
