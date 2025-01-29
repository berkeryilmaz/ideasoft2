<?php

namespace App\Services\CampaignRule;

class CampaingRuleFactory
{
    public static function create(string $scope): AbstractCampaignRule
    {
        return match ($scope) {
            'customer' => new CustomerCampaignRule(),
            'category' => new CategoryCampaignRule(),
            'order' => new OrderCampaignRule(),
            'product' => new ProductCampaignRule(),
            default => throw new \InvalidArgumentException("Can not create '{$scope} rule'")
        };
    }
}
