<?php

namespace App\Http\Controllers;

use App\Models\Purchase; 
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class AdminPurchaseController extends Controller
{
    public function index()
    {
        $purchases = Purchase::all(); // Ambil semua data purchase
        return view('admin.purchase', compact('purchases'));
    }

    // Menampilkan detail purchase
    public function show($id)
    {
        $purchase = Purchase::find($id);
        return view('admin.purchase_detail', compact('purchase'));
    }

    // Hapus purchase
    public function destroy($id)
    {
        $purchase = Purchase::find($id);

        if ($purchase) {
            // Jika statusnya cancel, update stok produk
            if ($purchase->status === 'cancel') {
                $product = $purchase->product;
                $product->stock += $purchase->quantity; // Tambahkan stok produk
                $product->save();
            }
            $purchase->delete(); // Hapus purchase
            return redirect()->route('admin.purchases')->with('success', 'Purchase canceled and stock updated');
        }

        return redirect()->route('admin.purchases')->with('error', 'Purchase not found');
    }

    // Method untuk update status (complete / cancel)
    public function updateStatus(Request $request, $id)
    {
        $purchase = Purchase::find($id); // Cari purchase berdasarkan ID

        if ($purchase) {
            // Mengubah status sesuai input
            $purchase->status = $request->status;
            $purchase->save();

            // Jika status 'cancel', kembalikan stok produk
            if ($request->status == 'cancel') {
                $product = Product::find($purchase->product_id);
                if ($product) {
                    $product->stock += $purchase->quantity; // Tambahkan kembali stok produk
                    $product->save();
                }
            }

            return redirect()->route('admin.purchases')->with('success', 'Purchase status updated successfully');
        }

        return redirect()->route('admin.purchases')->with('error', 'Purchase not found');
    }
}