<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Offer extends Model
{
    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function userProfile()
    {
        return $this->hasOneThrough(UserProfile::class, User::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
