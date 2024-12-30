<?php
namespace App\Http\Controllers;
use App\Models\Admin;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;

class AdminAuthController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('admin.login-admin');
    }

    // Proses login
    // app/Http/Controllers/AdminAuthController.php

    public function login(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors([
                'message' => 'Validation error.',
            ]);
        }

        // Ambil data admin berdasarkan name
        $admin = Admin::where('name', $request->name)->first();

        // Cek apakah admin ditemukan dan passwordnya valid
        if ($admin && Hash::check($request->password, $admin->password)) {
            // Login admin menggunakan guard admin
            Auth::guard('admin')->login($admin);

            // Regenerasi sesi untuk keamanan
            $request->session()->regenerate();

            // Redirect ke halaman dashboard admin setelah login berhasil
            return redirect()->route('admin.adminpage'); // Redirect ke adminpage
        }

        // Jika login gagal
        return back()->withErrors([
            'message' => 'Invalid name or password.',
        ]);
    }


    // Menampilkan halaman dashboard
    public function dashboard()
    {
        return view('admin.adminpage');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login-admin');
    }


    public function adminPage()
    {
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login-admin'); // Redirect jika belum login
        }
        return view('admin.adminpage'); // Halaman admin
    }
}

