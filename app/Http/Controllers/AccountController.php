<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AccountController extends Controller
{
    public function edit(Request $request)
    {
        $user = $request->user();
        return view('pages.account', compact('user'));
    }


    public function update(Request $request)
    {
        $user = $request->user();

        $data = $request->validate([
            'name'                   => ['required','string','max:255'],
            'surname'                => ['required','string','max:255'],
            'email'                  => ['required','email','max:255', Rule::unique('users')->ignore($user->id)],
            'phone'                  => ['nullable','string','max:20'],
            'adress'                 => ['nullable','string','max:255'],
            'zip'                    => ['nullable','string','max:20'],
            'town'                   => ['nullable','string','max:100'],
            'current_password'       => ['nullable','required_with:new_password','string'],
            'new_password'           => ['nullable','string','min:8','confirmed'],
        ]);


        if (!empty($data['current_password'])) {
            if (!Hash::check($data['current_password'], $user->password)) {
                return back()
                    ->withErrors(['current_password' => 'Neplatné súčasné heslo.'])
                    ->withInput();
            }
            $user->password = Hash::make($data['new_password']);
        }


        $user->fill([
            'name'    => $data['name'],
            'surname' => $data['surname'],
            'email'   => $data['email'],
            'phone'   => $data['phone'],
            'adress'  => $data['adress'],
            'zip'     => $data['zip'],
            'town'    => $data['town'],
        ])->save();

        return back()->with('status', 'Údaje boli úspešne uložené.');
    }
}
