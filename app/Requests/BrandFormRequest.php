<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandFormRequest extends FormRequest
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
            'name' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Brand name is required',
            'name.regex' => 'Brand name is not in the correct format',
        ];
    }
}
