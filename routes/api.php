<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CampaignController;

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('campaigns/getActiveCampaigns', [CampaignController::class, 'getActiveCampaigns']);
    Route::get('campaigns/getActiveCampaignsByOrder/{int:orderId}', [CampaignController::class, 'getActiveCampaignsByOrder']);
    Route::apiResource('campaigns', CampaignController::class)->except(['update']);
});
