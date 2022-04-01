<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    
    public function create()
    {

        return view('sessions.create');

    }

    public function store()
    {
       
       $attribute = request()->validate([

            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (! auth()->attempt($attribute)) {
            
            throw ValidationException::withMessages([

                'email' => 'Your provided credentials could not be verified'
            ]);
            
        }

        
        return redirect('/')->with('sucess', 'Welcome Back!');
        
        
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'GoodBye!');
    }


}
