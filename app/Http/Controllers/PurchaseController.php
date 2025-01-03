<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;


class PurchaseController extends Controller
{
    /**
     * Menampilkan halaman preorder dengan daftar produk.
     */
    public function showForm()
    {
        $products = Product::all(); // Ambil semua produk
        return view('pages.form-preorder', compact('products'));
    }

    /**
     * Menyimpan data preorder ke tabel purchases.
     */
    public function storePreorder(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'email' => 'required|email',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'zip' => 'required|string|max:20',
        ]);

        $product = Product::find($validated['product_id']);

        // Periksa apakah stok cukup
        if ($product->stock < $validated['quantity']) {
            return back()->withErrors(['quantity' => 'Not enough stock for the selected product.']);
        }

        // Hitung total harga
        $totalPrice = $product->price * $validated['quantity'];

        // Buat entri di tabel purchases
        $purchase = Purchase::create([
            'user_id' => Auth::id(), // Ambil ID pengguna yang sedang login
            'product_id' => $product->id,
            'quantity' => $validated['quantity'],
            'total_price' => $totalPrice,
            'email' => $validated['email'],
            'address' => $validated['address'],
            'city' => $validated['city'],
            'zip' => $validated['zip'],
        ]);

        // Kurangi stok produk
        $product->stock -= $validated['quantity'];
        $product->save();

        // Redirect dengan pesan sukses menggunakan SweetAlert
        session()->flash('swal', [
            'title' => 'Success!',
            'text' => 'Your preorder has been successfully submitted!',
            'icon' => 'success'
        ]);
        return redirect()->route('form-preorder');
    }

    
}
