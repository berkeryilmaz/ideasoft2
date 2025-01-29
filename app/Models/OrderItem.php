<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\Product;

class OrderItem extends Model
{
    protected $fillable = [
        "quantity",
        "unitPrice",
        "total",
        "product_id"
    ];
    protected $with = ['product'];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}

