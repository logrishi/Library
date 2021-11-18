<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateMemberDefaults extends FormRequest
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
            'member_category' => 'required',
            'max_books' => 'required',
            'max_days' => 'required',
            'fine_amount' => 'required'
        ];
    }

    public function messages(){
        return [
            'member_category.required' => 'Category is required',
            'max_books.required' => 'Max Books is required',
            'max_days.required' => 'Max Days is required',
            'fine_amount.required' => 'Fine Amount is required'
        ];
    }
}