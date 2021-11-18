<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateAuthorBook extends FormRequest
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
            'book_name' => 'required',
            // 'author_name[]' => 'required',
            'copies' => 'required'
        ];
    }

     public function messages(){
        return [
            'book_name.required' => 'Book Name is required',
            'author_name.required' => 'Author Name is required',
            'copies.required' => 'No of copies is required'
        ];
    }
}