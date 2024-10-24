<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChallanUploadRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'fee_paid_on' => 'required',
            'bank_receipt_no' => 'required',
            'challan_form' => 'required|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:4096'
        ];
    }
}
