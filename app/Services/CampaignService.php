<?php

namespace App\Services;

use App\DTOs\OrderCampaignDTO;
use App\Models\Campaign;
use App\Models\Order;
use App\Services\Helpers\CampaignHelper;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CampaignService
{
    private function insertCampaign($data): Campaign
    {
        return Campaign::create($data);
    }

    private function insertCampaignRules($rules, Campaign $campaign): Campaign
    {
        $campaign->campaignRules()->createMany($rules);
        return $campaign;
    }

    public function createCampaign($data)
    {
        DB::beginTransaction();
        try {
            $campaign = $this->insertCampaign($data);
            $this->insertCampaignRules($data['rules'], $campaign);
            DB::commit();
            return $campaign->load('campaignRules');
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }

    public function getAllCampaigns()
    {
        return Campaign::all();
    }

    public function getCampaign(Campaign $campaign)
    {
        return $campaign->load('campaignRules');
    }

    public function destroyCampaign(Campaign $campaign)
    {
        DB::beginTransaction();
        try {
            $campaign->campaignRules()->delete();
            $campaign->delete();
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
        }
        return false;
    }

    public function getActiveCampaigns()
    {
        return Campaign::where('start_at', '<=', Carbon::now()->format('Y/m/d H:i:s'))
            ->where('end_at', '>=', Carbon::now()->format('Y/m/d H:i:s'))
            ->get()
            ->load('campaignRules');
    }

    public function getActiveCampaignsByOrder(int $orderId): OrderCampaignDTO
    {
        $order = Order::find($orderId);
        $activeCampaigns = $this->getActiveCampaigns();

        $orderCampaignDTO = new OrderCampaignDTO(
            orderId: $order->id,
            discounts: [],
            totalDiscount: 0.0,
            discountedTotal: $order->total
        );
        $orderCampaignDTO = CampaignHelper::applyCampaigns($order, $orderCampaignDTO, $activeCampaigns);

        return $orderCampaignDTO;
    }
}
