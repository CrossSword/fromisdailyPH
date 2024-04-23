<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fromisMessage extends Model
{
    use HasFactory;

    // Specify the table name if it's not the plural form of the model name
    protected $table = 'message';

    // Define the fillable attributes for mass assignment
    protected $fillable = [
        'name', // Ensure this line is present
        'bias',
        'message',
    ];


    // Define the hidden attributes for serialization
    protected $hidden = [
        // Any attributes you want to hide from the model's array or JSON form
    ];

    // Define the attributes that should be cast
    protected $casts = [
        // Any attributes you want to cast to a specific type
    ];

    // Example of a relationship method
    public function user()
    {
        // return $this->belongsTo(User::class, 'user_email', 'email');
    }

    // Disable automatic timestamps
    public $timestamps = false;
}
