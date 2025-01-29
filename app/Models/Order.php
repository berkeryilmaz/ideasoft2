<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\Customer;
use App\Models\OrderItem;

class Order extends Model
{
    protected $fillable = [
        'total',
        'customer_id'
    ];

    public function customer():BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getCategories()
    {
        $categories = [];
        foreach ($this->orderItems() as $item) {
            $categories[$item->category_id]['quantity'] += $item->quantity;
            $categories[$item->category_id]['total_price'] += $item->total;
            $categories[$item->category_id]['min_price'] = min($categories[$item->category_id]['min_price'], $item->unitPrice);
            $categories[$item->category_id]['max_price'] = max($categories[$item->category_id]['max_price'], $item->unitPrice);
        }
        return $categories;
    }
}
