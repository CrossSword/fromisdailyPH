<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registration_cse extends Model
{
    use HasFactory;

    // Specify the table name if it's not the plural form of the model name
    protected $table = 'registration';

    // Define the fillable attributes for mass assignment
    protected $fillable = [
        'name', 'email', 'contact_number', 'twitter_username', 'facebook_link', 'ticket_type', 'proof_of_payment', 'image_filename'
    ];


    // Define the hidden attributes for serialization
    protected $hidden = [
        // Any attributes you want to hide from the model's array or JSON form
    ];

    // Example of a relationship method
    public function user()
    {
        // return $this->belongsTo(User::class, 'user_email', 'email');
    }

    // Disable automatic timestamps
    public $timestamps = false;
}
