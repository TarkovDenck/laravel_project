<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CatalogController extends Controller
{
    // Apply middleware to the constructor to restrict access to specific methods
    

    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login.form');  // Redirect unauthenticated users
        }
        return view('catalog');  // Display the catalog if logged in
    }

    public function lowPcPage()
    {
        if (!Auth::check()) {
            return redirect()->route('login');  // Redirect unauthenticated users
        }
        return view('pages.pc-branch-low');  // Replace 'pc.low' with the actual view for Low PC page
    }

    public function mediumPcPage()
    {
        if (!Auth::check()) {
            return redirect()->route('login');  // Redirect unauthenticated users
        }
        return view('pages.pc-branch-medium');  // Replace 'pc.medium' with the actual view for Medium PC page
    }

    public function highPcPage()
    {
        if (!Auth::check()) {
            return redirect()->route('login');  // Redirect unauthenticated users
        }
        return view('pages.pc-branch-high');  // Replace 'pc.high' with the actual view for High PC page
    }
}

