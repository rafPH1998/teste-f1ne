<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreClient extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $id = $this->user;

        return [
            'name'      => ['required', 'min:2', Rule::unique('users')->ignore($id)],
            'email'     => ['required', Rule::unique('users')->ignore($id)],
            'phone'     => ['nullable', 'min:10', 'max:10', Rule::unique('users')->ignore($id)],
            'cellphone' => ['required', 'min:11', 'max:11', Rule::unique('users')->ignore($id)],
        ];
    }
}
