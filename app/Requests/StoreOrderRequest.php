<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
//            'receiver_name' => ['required'],
//            'receiver_phone' => ['required'],
//            'receiver_address' => ['required'],
//            'customer_id' => ['required'],
        ];
    }

    public function messages()
    {
        return [
//            'receiver_name.required' => 'required',
//            'receiver_phone.required' => 'required',
//            'receiver_address.required' => 'required',
//            'customer_id.required' => 'required',
        ];
    }
}
