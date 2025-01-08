<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'payment_plan',
        'amount',
        'status',
        'payment_reference',
    ];

    // A payment belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Payment.php (Model)
    public function property()
    {
        return $this->belongsTo(Property::class);
    }

}
