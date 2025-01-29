<?php

namespace App\Services\Campaign;

use App\DTOs\OrderCampaignDTO;
use App\Models\Campaign;
use App\Models\CampaignRule;
use App\Models\Order;
use App\Services\CampaignRule\CampaingRuleFactory;

abstract class AbstractCampaign
{
    public function checkCampaignRules(Order $order, Campaign $campaign): bool
    {
        foreach ($campaign->campaignRules()->get() as $campaignRule) {
            $rule = CampaingRuleFactory::create($campaignRule->scope);
            if (!$rule->checkRule($order, $campaignRule)) {
                return false;
            }
        }

        if (count($campaign->campaignRules()->get()) == 0) {
            return false;
        }

        return true;
    }

    public abstract function applyCampaign(OrderCampaignDTO $campaignDTO, Campaign $campaign, Order $order): OrderCampaignDTO;

}
