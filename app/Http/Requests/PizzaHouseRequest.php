<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PizzaHouseRequest extends FormRequest
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
            'name' => 'required|min:3|max:30',
            'city' => 'required|min:3|max:30',
            'state' => 'required|min:3|max:30',
            'phone' => 'required|min:3|max:10',
            'base' => 'required',
            'type' => 'required',
        ];
    }
}
