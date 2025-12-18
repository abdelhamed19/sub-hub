<?php

namespace App\Http\Requests\Web\SuperAdmin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateExistingClientAssistantRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'client_id' => ['required', 'exists:clients,id'],
            'name' => ['required', 'string', 'max:255', 'min:3'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:client_assistants,email,' . $this->assistant->id],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'phone' => ['nullable', 'string', 'max:20'],
            'role' => ['required', 'string', 'max:100'],
            'is_active' => ['required', 'boolean'],
            'image' => ['nullable', 'image'],
        ];
    }
}
