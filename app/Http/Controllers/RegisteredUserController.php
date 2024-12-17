<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        // validate
        $attributes = request()->validate([
            'name' => ['required', 'min:5'],
            'email' => ['required', 'email'],
            'password' => ['required', Password::min(6), 'confirmed']
        ]);

        // save
        $user = User::create($attributes);
        // login
        Auth::login($user);
        // redirect
        return redirect('/jobs');
    }
}
