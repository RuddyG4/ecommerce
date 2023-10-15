<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingTracking extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'tracking_name',
        'tracking_description',
        'tracking_datetime',
    ];
    
    public function order(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}