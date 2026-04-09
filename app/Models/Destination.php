<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'city',
        'description',
        'image',
        'price',
        'rating',
        'is_active',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function facilities()
    {
        return $this->hasMany(Facility::class);
    }

    public function tourPackages()
    {
        return $this->belongsToMany(TourPackage::class);
    }
}
