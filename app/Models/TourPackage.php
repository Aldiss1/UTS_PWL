<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourPackage extends Model
{
    protected $fillable = ['name', 'description', 'price', 'quota', 'departure_date', 'is_active'];

    protected $casts = [
        'departure_date' => 'date',
        'is_active' => 'boolean',
    ];

    public function destinations()
    {
        return $this->belongsToMany(Destination::class);
    }
    
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
