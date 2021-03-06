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
            'category' => 'required|in:all_room,living_room,children_room,decoration_room,bed_room',
            'price' => 'required|integer',
            'about_product' => 'required|min:25',
            'image1' => 'required|mimes:jpg,jpeg,png|file|max:2048',
            'image2' => 'required|mimes:jpg,jpeg,png|file|max:2048',
            'image3' => 'required|mimes:jpg,jpeg,png|file|max:2048'

        ];
    }
}
