<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class PasswordController extends Controller
{
    public function updatePassword(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'old-password' => 'required',
            'new-password' => 'required|confirmed|min:8', // `confirmed` untuk mencocokkan dengan `new-password_confirmation`
        ]);

        // Cari user berdasarkan email
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found.'
            ], 404);
        }

        // Cek apakah password lama cocok
        if (!Hash::check($request->input('old-password'), $user->password)) {
            return response()->json([
                'status' => 'error',
                'message' => 'The old password is incorrect.'
            ], 400);
        }

        // Update password dengan password baru
        $user->password = Hash::make($request->input('new-password'));
        $user->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Password updated successfully.'
        ], 200);
    }

}