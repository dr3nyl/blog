<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
            "username" => ['required', 'max:255', 'min:8'],
            "email" => ['required', 'email', 'max:255'],
            "password" => ['required', 'min:7', 'max:255']
        ]);

        
        User::create($attr);

        return redirect('/');
    }

}
