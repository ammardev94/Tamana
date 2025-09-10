<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PortfolioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->guard('admin')->check();
    }

    public function rules(): array
    {
        $isUpdate = in_array($this->method(), ['PUT', 'PATCH']);

        return [
            'thumbnail_img' => $isUpdate
                ? 'nullable|image|mimes:jpeg,png,jpg,webp|max:20480'
                : 'required|image|mimes:jpeg,png,jpg,webp|max:20480',

            'images' => $isUpdate
                ? 'nullable|array'
                : 'nullable|array',

            'images.*' => 'image|mimes:jpeg,png,jpg,webp|max:20480',

            'title' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'map' => 'nullable|string',
            'map_url' => 'nullable|url|max:255',
            'client' => 'nullable|string|max:255',
            'value' => 'nullable|string|max:255',
            'consortium' => 'nullable|string|max:255',
            'tanama_role' => 'nullable|string|max:255',
            'builder' => 'nullable|string|max:255',
            'architect' => 'nullable|string|max:255',
            'financial_close_date' => 'nullable|string|max:255',
            'completion_date' => 'nullable|string|max:255',
            'contract_terms' => 'nullable|string|max:255',
            'awards' => 'nullable|string|max:255',
            'other_information' => 'nullable|string|max:500',
            'status' => 'string|in:in-progress,completed',
        ];
    }

    public function attributes(): array
    {
        return [
            'thumbnail_img' => 'thumbnail image',
            'images' => 'portfolio images',
        ];
    }
}
