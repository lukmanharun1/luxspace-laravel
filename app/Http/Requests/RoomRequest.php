<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
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
            'name_product' => 'required',
            'category' => 'required',
            'price' => 'required',
            'about_product' => 'required',
            'image1' => 'required',
            'image2' => 'required',
            'image3' => 'required'

        ];
    }
}
