<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateIssue extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'accession_no'  =>  'required',
            'is_returned'  =>  'required'
        ];
    }

    public function messages()
    {
        return [
            'is_returned.required' => 'is_returned is required',
            'accession_no.required' => 'accession_no is required'
        ];
    }
}