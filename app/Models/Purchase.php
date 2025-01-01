<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [
        'product_id', 'user_id', 'quantity', 'total_price', 'status', 'email', 'address', 'city', 'zip'
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class); // Ini akan menghubungkan user_id di Purchase dengan id di User
    }

    // Relasi ke Product (jika diperlukan)
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
