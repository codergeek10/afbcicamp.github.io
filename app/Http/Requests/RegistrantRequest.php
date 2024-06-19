<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Http\FormRequest;

class RegistrantRequest extends FormRequest
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
        Log::info('Validation reached');
        return [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'gender' => 'required|string|in:male,female',
            'age_group' => 'required|string|max:50',
            'illness' => 'required|string|in:no,yes',
            'illness_type' => 'nullable|string|max:255',
            'contact_1_name' => 'required|string|max:255',
            'contact_1_phone' => 'required|string|max:20',
            'contact_2_name' => 'nullable|string|max:255',
            'contact_2_phone' => 'nullable|string|max:20',
            'membership' => 'required|string|in:no,yes',
            'church_id' => 'required|integer',
            'attendance' => 'required|string|in:no,yes',
            'role_id' => 'nullable|integer',
            'comment' => 'nullable|string|max:1000',
        ];
    }
}
