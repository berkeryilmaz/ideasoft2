<?php

namespace App\DTOs;

class OrderCampaignDiscountDTO
{
    public function __construct(
        public string $discountReason,
        public float  $discountAmount = 0.0,
        public float  $subtotal
    )
    {
    }
}
