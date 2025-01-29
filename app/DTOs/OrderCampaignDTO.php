<?php

namespace App\DTOs;

final class OrderCampaignDTO
{
    public function __construct(
        public int   $orderId,
        public array $discounts = [],
        public float $totalDiscount = 0.0,
        public float $discountedTotal
    )
    {
    }
}
