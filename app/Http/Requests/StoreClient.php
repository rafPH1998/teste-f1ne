<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClient extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'      => 'required|unique:users',
            'email'     => 'required|unique:users',
            'telephone' => 'nullable|unique:users|min:10|max:10',
            'cellphone' => 'required|unique:users|min:11|max:11',
        ];
    }
}
