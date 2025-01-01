<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'stock',
    ];

    // Relation to Purchase model (optional, if needed)
    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
}
