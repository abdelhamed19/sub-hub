<?php

namespace App\Http\Requests\Web\SuperAdmin;

use App\Enums\BusinessType;
use App\Enums\IndustryType;
use Illuminate\Validation\Rule;
use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class CreateNewClientRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email',
            'legal_name' => 'required|string|max:255',
            'phone' => [
                'required',
                'min:7',
                'max:20',
                'regex:/^[+]?[0-9]{7,20}$/',
                'unique:clients,phone',
            ],
            'alternative_phone' => [
                'nullable',
                'min:7',
                'max:20',
                'regex:/^[+]?[0-9]{7,20}$/',
                'unique:clients,alternative_phone',
                'different:phone',
            ],
            'address' => 'nullable|string',
            'city' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|max:20',
            'website' => 'nullable|url|max:255',
            'business_type' => [
                'nullable',
                'string',
                'max:255',
                Rule::in(BusinessType::options()), // كويس
            ],

            'industry' => [
                'nullable',
                'string',
                'max:255',
                Rule::in(IndustryType::options()),
            ],
            'is_active' => 'nullable|boolean',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tax_id' => 'nullable|numeric|unique:clients,tax_id',
            'commercial_registration' => 'nullable|numeric|unique:clients,commercial_registration',
            'employee_count' => 'nullable|numeric',
        ];
    }
}
