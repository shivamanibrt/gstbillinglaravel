<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'party_type' => 'required',
            'full_name' => 'required|string|min:2|max:20',
            'phone_no' => 'required|string|min:10|max:15',
            'address' => 'required|max:255',
            'account_holder_name' => 'required|string|min:2|max:20',
            'account_no' => 'required|numeric|digits_between:1,30',
            'bank_name' => 'nullable|string|max:255',
            'ifcs_code' => 'nullable|string|max:30',
            'branch_address' => 'required|string|max:30',
        ];
    }
}
