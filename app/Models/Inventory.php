<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Inventory extends Pivot
{
    use HasFactory;

    protected $table = 'inventory';
    public $incrementing = true;
    
    protected $fillable = [
        'product_id',
        'branch_id',
        'stock',
        'sale_price',
        'purchase_price',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }
}
