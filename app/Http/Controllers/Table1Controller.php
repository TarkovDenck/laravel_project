<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Comment;


class Table1Controller extends Controller
{
    public function index()
    {
        // Mengambil semua data dari tabel 'users'
        $users = User::all();

        // Mengirim data ke view 'admin.table1'
        return view('admin.table1', compact('users'));
    }

    public function destroy($id)
    {
        $user = User::find($id);

        // Periksa apakah user ada
        if ($user) {
            $user->delete(); // Hapus data user
            return redirect()->route('table1')->with('success', 'User deleted successfully');
        }

        return redirect()->route('table1')->with('error', 'User not found');
    }

    public function showTable2()
    {
        // Fetch comments along with related user data (using eager loading)
        $comments = Comment::with('user')->get();

        // Pass the data to the view
        return view('admin.table2', compact('comments'));
    }


}
