<?php

namespace App\Services\CampaignRule;

use App\Models\CampaignRule;
use App\Models\Order;

abstract class AbstractCampaignRule
{
    public abstract function checkRule(Order $order, CampaignRule $campaignRule): bool;

}
