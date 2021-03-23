<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShippingDetailsRequest extends FormRequest
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
            'name' => 'required|min:6',
            'email_address' => 'required|email',
            'address' => 'required|min:20',
            'phone_number' => 'required|numeric|min:11',
            'courier' => 'required|in:fedex,dhl',
            'payment' => 'required|in:midtrans,mastercard,bitcoin,american_express'
        ];
    }
}
