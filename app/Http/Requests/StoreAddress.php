<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAddress extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'street'   => 'required|min:2|max:20',
            'district' => 'required|min:2|max:20',
            'number'   => 'required|min:2|max:20',
        ];
    }
}
