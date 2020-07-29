<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateMain extends FormRequest
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
            'name' => 'required|min:2',
            'email' => 'required',
            'price' => 'required|numeric|min:1'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Ten khong duoc bo trong',
            'name.min' => 'ten tren 2 ky tu',
            'email.required' => 'email khong dc trong',
            'price.numeric' => 'Giá phải dạng số'
        ];
    }
}
