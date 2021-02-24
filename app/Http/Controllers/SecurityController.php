<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SecurityController extends Controller
{
    public function register(Request $request): RedirectResponse
    {

        $request->validate([
            'email'=>'required|unique:users|max:255',
            'username'=>'required|unique:users|max:15',
            'password'=>'required|confirmed',
            'cgu'=>'required'
        ]);


        $user = new User();
        $user->name = $request->input('username');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));

        $user->save();

        return redirect()->route('login')->with('success', 'Account created');
    }

    public function login(Request $request): RedirectResponse
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        $credentials = $request->only(['email','password']);

        if (Auth::attempt($credentials)){
            $request->session()->regenerate();
            Session::flash('success', 'Welcome back '.Auth::user()->name);
            return redirect()->intended();
        }


        return redirect()->back()->with('error', 'Credentials not match');
    }
}
