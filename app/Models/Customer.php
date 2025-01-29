<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'since',
        'revenue',
    ];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
