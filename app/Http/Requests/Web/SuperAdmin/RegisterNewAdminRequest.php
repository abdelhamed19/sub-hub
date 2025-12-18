<?php

namespace App\Http\Requests\Web\SuperAdmin;

use App\Enums\SuperAdminRole;
use Illuminate\Validation\Rule;
use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class RegisterNewAdminRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // dd(SuperAdminRole::values(), request()->all());
        return [
            'name' => ['required', 'string', 'max:255', 'min:3'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('super_admins', 'email')],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', Rule::in(SuperAdminRole::values())],
            'is_active' => ['required', 'boolean'],
            'image' => ['nullable', 'image'],
        ];
    }
}
