<?php

namespace App\Http\Requests\Web\SuperAdmin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateExistingPlanRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'compare_price' => ['nullable', 'numeric', 'min:0'],
            'duration_days' => ['required', 'integer', 'min:1'],
            'is_active' => ['required', 'boolean'],
            'features' => ['required', 'array'],
            'features.*' => ['string', 'max:255'],
            'type' => ['nullable', 'string', 'max:255']
        ];
    }
}
