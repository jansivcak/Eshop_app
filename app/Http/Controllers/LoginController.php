<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function show(Request $request)
    {

        if (! $request->session()->has('url.intended')) {
            $request->session()->put('url.intended', url()->previous());
        }

        return view('pages.login');
    }


    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $intended = $request->session()->pull('url.intended', route('home'));
            return redirect($intended);
        }


        return back()->withErrors([
            'email' => 'Nesprávny email alebo heslo.',
        ])->onlyInput('email');
    }
}
