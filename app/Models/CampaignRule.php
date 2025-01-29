<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CampaignRule extends Model
{
    protected $fillable = [
        "scope",
        "attribute",
        "operator",
        "value",
        "campaign_id"
    ];
}
