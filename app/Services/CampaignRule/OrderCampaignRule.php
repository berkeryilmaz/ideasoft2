<?php

namespace App\Services\CampaignRule;

use App\Models\CampaignRule;
use App\Models\Order;
use App\Services\CampaignRule\AbstractCampaignRule;
use App\Services\Helpers\CampaignHelper;

class OrderCampaignRule extends AbstractCampaignRule
{

    public function checkRule(Order $order, CampaignRule $campaignRule): bool
    {
        $attribute = $campaignRule->attribute;
        return CampaignHelper::checkRule(
            $order->$attribute,
            $campaignRule->value,
            $campaignRule->operator
        );
    }
}
