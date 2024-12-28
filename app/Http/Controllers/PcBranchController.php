<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PcBranchController extends Controller
{
    // Menampilkan halaman dengan pengecekan login
    public function showPcBranchLow()
    {
        return view('pages.pc-branch-low');
    }
    public function showPcBranchmedium()
    {
        return view('pages.pc-branch-medium');
    }

    public function showPcBranchhigh()
    {
        return view('pages.pc-branch-high');
    }

    // Menangani Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('home'); // Arahkan ke halaman utama setelah logout
    }
}
