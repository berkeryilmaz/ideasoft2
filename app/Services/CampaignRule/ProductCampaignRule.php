<?php

namespace App\Services\CampaignRule;

use App\Models\CampaignRule;
use App\Models\Order;
use App\Services\Helpers\CampaignHelper;
use App\Services\CampaignRule\AbstractCampaignRule;

class ProductCampaignRule extends AbstractCampaignRule
{

    public function checkRule(Order $order, CampaignRule $campaignRule): bool
    {
        $orderItems = $order->orderItems();
        $attribute = $campaignRule->attribute;
        foreach ($orderItems as $item) {
            if (!CampaignHelper::checkRule(
                $item->$attribute,
                $campaignRule->value,
                $campaignRule->operator
            )) {
                return false;
            }
        }

        return false;
    }
}
