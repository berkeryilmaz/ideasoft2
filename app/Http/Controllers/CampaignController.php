<?php

namespace App\Http\Controllers;

use App\Http\Requests\CampaignRequest;
use App\Models\Campaign;

use App\Services\CampaignService;

class CampaignController extends Controller
{
    protected CampaignService $campaignService;

    public function __construct(CampaignService $campaignService)
    {
        $this->campaignService = $campaignService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->campaignService->getAllCampaigns());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CampaignRequest $request)
    {
        $validatedData = $request->validated();
        return response()->json($this->campaignService->createCampaign($validatedData));
    }

    /**
     * Display the specified resource.
     */
    public function show(Campaign $campaign)
    {
        return response()->json($this->campaignService->getCampaign($campaign));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Campaign $campaign)
    {
        return response()->json($this->campaignService->destroyCampaign($campaign));
    }

    public function getActiveCampaigns()
    {
        return $this->campaignService->getActiveCampaigns();
    }

    public function getActiveCampaignsByOrder(int $orderId)
    {
        return response()->json($this->campaignService->getActiveCampaignsByOrder($orderId));
    }
}
