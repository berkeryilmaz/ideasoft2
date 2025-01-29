<?php

namespace App\Services\CampaignRule;

use App\Models\CampaignRule;
use App\Models\Order;
use App\Services\Helpers\CampaignHelper;
use App\Services\CampaignRule\AbstractCampaignRule;

class CategoryCampaignRule extends AbstractCampaignRule
{

    public function checkRule(Order $order, CampaignRule $campaignRule): bool
    {
        $categories = $order->getCategories();
        foreach ($categories as $category) {
            if (!CampaignHelper::checkRule(
                $category[$campaignRule->attribute],
                $campaignRule->value,
                $campaignRule->operator
            )) {
                return false;
            };
        }

        return true;
    }


}
