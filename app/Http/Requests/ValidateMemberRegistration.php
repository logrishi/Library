<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateMemberRegistration extends FormRequest
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
            'registration_no' => 'required | unique:member_registrations',
            'member_name' => 'required',
            'member_category_id' => 'required',
            'phone' => 'required',
            'details' => 'required'
        ];
    }

    public function messages(){
        return [
            'registration_no.required' => 'Registration No is required',
            'member_name.required' => 'Name is required',
            'member_category_id.required' => 'Member Category is required',
            'phone.required' => 'Phone No is required',
            'details.required' => 'Details required'
        ];
    }
}