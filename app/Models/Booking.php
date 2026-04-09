<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['booking_code', 'tour_package_id', 'customer_name', 'customer_email', 'customer_phone', 'participants_count', 'total_price', 'payment_status'];

    public function tourPackage()
    {
        return $this->belongsTo(TourPackage::class);
    }
    
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($model) {
            if (empty($model->booking_code)) {
                $model->booking_code = 'TRV-' . strtoupper(uniqid());
            }
        });
    }
}
