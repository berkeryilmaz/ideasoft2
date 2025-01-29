<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CampaignRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'rules' => "required|array|min:1",
            'rules.*.scope' => 'required',
            'rules.*.attribute' => "required",
            'rules.*.operator' => "required",
            'rules.*.value' => "required|numeric",
            'name' => "required|max:255",
            'description' => "required|max:255",
            'start_at' => "required|date_format:Y-m-d H:i:s",
            'end_at' => "required|date_format:Y-m-d H:i:s",
            'discount_percent' => 'required|numeric',
            'discount_amount' => 'required|numeric',
            'campaign_type' => 'required|max:255'
        ];
    }
}
