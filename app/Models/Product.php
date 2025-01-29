<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\ProductCategory;

class Product extends Model
{
    protected $fillable = [
        "name",
        "price",
        "stock",
        "category_id"
    ];

    public function category():BelongsTo
    {
        return $this->belongsTo(ProductCategory::class);
    }
}
