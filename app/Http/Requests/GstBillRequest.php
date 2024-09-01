<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GstBillRequest extends FormRequest
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
            'party_id' => 'required|exists:parties,id',
            'invoice_date' => 'required|date',
            'invoice_no' => 'required|string|max:50|unique:gst_bills,invoice_no',
            'item_description' => 'required|string|max:255',
            'total_amount' => 'required|numeric|min:0',
            'cgst_rate' => 'nullable|numeric|min:0|max:100',
            'sgst_rate' => 'nullable|numeric|min:0|max:100',
            'igst_rate' => 'nullable|numeric|min:0|max:100',
            'tax_amount' => 'nullable|numeric|min:0',
            'sgst_amount' => 'nullable|numeric|min:0',
            'net_amount' => 'required|numeric|min:0',
            'declaration' => 'nullable|string|max:500',
        ];
    }
}
