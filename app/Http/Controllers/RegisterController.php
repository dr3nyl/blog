<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {

        $attr = request()->validate([

            "name" => ['required', 'max:255'],
            "username" => ['required', 'max:255', 'min:7', Rule::unique('users', 'username')],
            "email" => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
            "password" => ['required', 'min:5', 'max:255'],
            "picture" => 'required'

        ]);

        $attr['picture'] = request()->file('picture')->store('profile-picture');

        $user = User::create($attr);

        Auth()->login($user);
        
        return redirect('/')->with('success', 'User added succsessfully!');
    }

}
