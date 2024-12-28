<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SignupController extends Controller
{
    // Tampilkan form sign up
    public function showForm()
    {
        return view('pages.home');
    }

    // Proses pendaftaran
    public function processSignup(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email',
            'username' => 'required|string|min:3|max:50|unique:users,username',
            'password' => 'required|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Simpan data ke database
        User::create([
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password), // Enkripsi password
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('signup.form')->with('success', 'Sign up successful! You can now log in.');
    }

}
