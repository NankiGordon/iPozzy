<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'title',               // Property title (town)
        'province',            // Property province
        'description',         // Property description
        'price',               // Property price
        'bedrooms',            // Number of bedrooms
        'bathrooms',           // Number of bathrooms
        'garage',              // Number of garages
        'room_type',           // Room type (e.g., backyard room, shared house)
        'amenities',           // Property amenities (Wi-Fi, parking, etc.)
        'available_date',   // Property availability date
        'image_1',              // Property images
        'image_2',
        'image_3',
        'image_4',
        'image_5',
        'image_6',
        'user_id',             // User ID
        'availability',


    ];

    protected $casts = [
        'amenities' => 'array',  // Cast amenities to an array since it's stored as JSON

    ];

    // Relationship with User (assuming each property belongs to a user)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function offers()
    {
        return $this->hasMany(Offer::class);
    }
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

}
