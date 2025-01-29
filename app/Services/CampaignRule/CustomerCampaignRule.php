<?php

namespace App\Services\CampaignRule;

use App\Models\CampaignRule;
use App\Models\Order;
use App\Services\Helpers\CampaignHelper;
use App\Services\CampaignRule\AbstractCampaignRule;

class CustomerCampaignRule extends AbstractCampaignRule
{

    public function checkRule(Order $order, CampaignRule $campaignRule): bool
    {
        $customer = $order->customer();
        $attribute = $campaignRule->attribute;
        return CampaignHelper::checkRule(
            $customer->$attribute,
            $campaignRule->value,
            $campaignRule->operator
        );
    }
}
