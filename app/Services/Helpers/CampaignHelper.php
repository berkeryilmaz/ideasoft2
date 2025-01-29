<?php

namespace App\Services\Helpers;

use App\DTOs\OrderCampaignDTO;
use App\Models\Order;
use App\Services\Campaign\CampaingFactory;

class CampaignHelper
{
    public static function checkRule($firstVal, $secondVal, $operator)
    {
        return match ($operator) {
            '==' => $firstVal == $secondVal,
            '===' => $firstVal === $secondVal,
            '!=' => $firstVal != $secondVal,
            '<>' => $firstVal <> $secondVal,
            '!==' => $firstVal !== $secondVal,
            '>' => $firstVal > $secondVal,
            '<' => $firstVal < $secondVal,
            '>=' => $firstVal >= $secondVal,
            '<=' => $firstVal <= $secondVal,
            '<=>' => $firstVal <=> $secondVal,
            default => throw new InvalidArgumentException("Unavailable operator: $operator"),
        };
    }

    public static function applyCampaigns(Order $order, OrderCampaignDTO $orderCampaignDTO, $activeCampaigns)
    {
        foreach ($activeCampaigns as $activeCampaign) {
            $campaign = CampaingFactory::create($activeCampaign->campaign_type);
            if ($campaign->checkCampaignRules($order, $activeCampaign)) {
                $orderCampaignDTO = $campaign->applyCampaign($orderCampaignDTO, $activeCampaign, $order);
            }
        }
        return $orderCampaignDTO;
    }

}
