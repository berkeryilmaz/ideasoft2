<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\CampaignRule;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Campaign extends Model
{
    protected $fillable = [
        "name",
        "description",
        "start_at",
        "end_at",
        "discount_percent",
        "discount_amount",
        "campaign_type"
    ];

    public function campaignRules(): HasMany
    {
        return $this->hasMany(CampaignRule::class);
    }
}
