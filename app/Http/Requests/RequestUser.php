<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestUser extends FormRequest
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
            'name' => ['required', 'string','regex:^[a-zA-Z]+$'],
            'phone' => ['required','numeric','size:11'],
            'address_address' => ['required', 'string'],
            'address_latitude' => ['required', 'double'],
            'address_longitude' => ['required', 'double'],
            'favorite_fruit' => ['required','in:Apple,Banana,Orange']
        ];
    }
}
