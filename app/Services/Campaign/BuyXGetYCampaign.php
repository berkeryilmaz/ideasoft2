<?php

namespace App\Services\Campaign;

use App\DTOs\OrderCampaignDTO;
use App\Models\Campaign;
use App\Models\Order;
use App\DTOs\OrderCampaignDiscountDTO;

class BuyXGetYCampaign extends AbstractCampaign
{
    public function applyCampaign(OrderCampaignDTO $campaignDTO, Campaign $campaign, Order $order): OrderCampaignDTO
    {
        $discount = $order->orderItems()->first()->unitPrice;
        $campaignDTO->totalDiscount += $discount;
        $campaignDTO->discountedTotal -= $discount;
        $campaignDTO->discounts[] = new OrderCampaignDiscountDTO(
            discountReason: $campaign->name,
            discountAmount: $discount,
            subtotal: $campaignDTO->discountedTotal
        );
        return $campaignDTO;
    }
}
