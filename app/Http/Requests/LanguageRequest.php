<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LanguageRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|string|max:100',
            'abbr'=>'required|string|max:10',
            'direction'=>'required|in:ltr,rtl',
            //'active'=>'required|in:0,1',

        ];
    }

    public function messages(){

        return [
            'required' => 'This field is required',
            'in' => 'The entered values are not valid ',
            'name.string' => 'Must be a latter',
            'abbr.max' => 'This field must be longer than 10 letter ',
            'abbr.string' => 'This field must be a letter ',
            'name.max' => 'This field must not exceed 100 letter ',

        ];

    }
}
