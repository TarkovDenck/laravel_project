<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('pages.login');
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation error.',
                'errors' => $validator->errors(),
            ], 422); // Status code 422 untuk validasi error
        }

        // Ambil kredensial untuk login
        $credentials = $request->only('username', 'password');

        // Cek login
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            // Regenerasi sesi untuk keamanan
            $request->session()->regenerate();

            Log::info('Login successful for user: ' . $request->username);

            return response()->json([
                'status' => 'success',
                'message' => 'Login successful.',
                'redirect' => route('home'), // Pastikan route 'home' ada
            ]);
        }

        // Jika gagal login
        Log::warning('Login failed for user: ' . $request->username);

        return response()->json([
            'status' => 'error',
            'message' => 'Invalid username or password.',
        ], 401); // Status code 401 untuk error login
    }

    // Menampilkan halaman dashboard
    public function dashboard()
    {
        return view('dashboard'); // Pastikan view "dashboard" tersedia
    }

    // Proses logout
    public function logout(Request $request)
    {
        // Logout user
        Auth::logout();

        // Invalidate sesi saat ini
        $request->session()->invalidate();

        // Regenerasi token CSRF untuk keamanan
        $request->session()->regenerateToken();

        Log::info('Logout successful.');

        return redirect('/home'); // Redirect ke halaman utama
    }
    
}
