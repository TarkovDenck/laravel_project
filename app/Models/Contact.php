<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    // Define the table name (optional, Laravel uses plural by default)
    protected $table = 'contacts';

    // Define the fillable fields (columns you want to allow mass assignment)
    protected $fillable = ['email', 'message'];
}
