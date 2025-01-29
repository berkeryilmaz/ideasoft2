<?php

namespace App\Services\Campaign;

class CampaingFactory
{
    public static function create(string $campaignType): AbstractCampaign
    {
        return match ($campaignType) {
            'basic_percent' => new BasicPercentCampaign(),
            'buy_x_get_y' => new BuyXGetYCampaign(),
            'buy_from_x_get_y_perscent_discount' => new BuyXGetYCampaign(),
            default => throw new \InvalidArgumentException("Can not create '{$campaignType} rule'")
        };
    }
}
