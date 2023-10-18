<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;
    public $timestamps = false;
    
    protected $fillable = [
        'branch_id',
        'first_name',
        'last_name',
        'total',
        'phone',
        'customer_id',
        'shipping_method_id',
        'city_id',
        'order_date',
        'shipping_address1',
        'shipping_address2',
        'order_instructions',
        'guest_email',
        'discount_id'
    ];

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function shippingMethod(): BelongsTo
    {
        return $this->belongsTo(ShippingMethod::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function discount(): BelongsTo
    {
        return $this->belongsTo(Discount::class);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function shippingTrackings(): HasMany
    {
        return $this->hasMany(ShippingTracking::class);
    }

    public function latestTracking(): HasOne
{
    return $this->hasOne(ShippingTracking::class)->latestOfMany();
}
}
