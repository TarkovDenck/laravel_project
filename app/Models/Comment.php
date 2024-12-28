<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    // The table associated with the model.
    protected $table = 'comments';

    // The attributes that are mass assignable.
    protected $fillable = [
        'user_id',
        'comment',
    ];

    // Define the relationship with the User model.
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
