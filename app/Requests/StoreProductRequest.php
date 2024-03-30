<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'price' => ['required'],
            'quantity' => ['required'],
            'category_id' => ['required'],
            'brand_id' => ['required'],
            'age_id' => ['required'],
        ];
    }
}
