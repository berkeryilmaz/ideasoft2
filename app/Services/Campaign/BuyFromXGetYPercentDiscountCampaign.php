<?php

namespace App\Services\Campaign;

use App\DTOs\OrderCampaignDiscountDTO;
use App\DTOs\OrderCampaignDTO;
use App\Models\Campaign;
use App\Models\Order;

class BuyFromXGetYPercentDiscountCampaign extends AbstractCampaign
{

    public function applyCampaign(OrderCampaignDTO $campaignDTO, Campaign $campaign, Order $order): OrderCampaignDTO
    {
        $discount = min(array_map(fn($item) => $item->unitePrice, $order->orderItems())) * ($campaign->discount_percent / 100);
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
