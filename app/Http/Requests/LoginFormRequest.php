<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginFormRequest extends FormRequest
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
            'username' => 'required|min:5|max:255',
            'password' => 'required|min:8',
        ];
    }

    public function messages()
    {
        return [
            'required' => __('validation.required'),
            'min' => __('validation.min'),
            'max' => __('validation.max'),
        ];
    }

    public function attributes()
    {
        return [
            'username' => 'Tên khoản',
            'password' => 'Mật khẩu',
        ];
    }
}
