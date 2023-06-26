<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MainCategoryRequest extends FormRequest
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
     *  \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        return [
            'photo' => 'required_without:id|mimes:jpg,jpeg,png',
            'category' => 'required|array|min:1',
            'category.*.name' => 'required',
            'category.*.abbr' => 'required',
            //'category.*.active' => 'required',
        ];
    }

    // public function messages(){
    //     return [

    //     ];
    // }
}
