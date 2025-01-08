<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyImage extends Model
{
    use HasFactory;

    // Define the table name if it's not following the plural naming convention
    protected $table = 'property_images';

    // The attributes that are mass assignable
    protected $fillable = [
        'property_id',
        'image_1',
        'image_2',
        'image_3',
        'image_4',
        'image_5',
        'image_6',
    ];

    // Define the relationship with the Property model
    public function property()
    {
        return $this->belongsTo(Property::class);
    }

}
