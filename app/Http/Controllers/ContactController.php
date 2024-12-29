<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User; // Import model User

class ContactController extends Controller
{
    

    public function store(Request $request)
    {
        $request->validate([
            'email' => [
                'required',
                'email',
                function ($attribute, $value, $fail) {
                    if (!User::where('email', $value)->exists()) {
                        $fail('Email must be registered to submit a contact message.');
                    }
                },
            ],
            'message' => 'required|string|max:500',
        ]);

        // Jika validasi berhasil, simpan data
        Contact::create([
            'email' => $request->email,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Your message has been successfully sent.');
    }

    public function showContacts() {
        $contacts = Contact::all();
        return view('admin.Contact-List', compact('contacts'));
    }
 
    
}
