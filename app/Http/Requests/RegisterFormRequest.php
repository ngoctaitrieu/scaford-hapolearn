<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
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
            'username' => 'required|string|min:5|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|same:password',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Tên tài khoản không được để trống',
            'username.min' => 'Tên tài khoản phải có tối thiểu 5 ký tự',
            'username.max' => 'Tên tài khoản có tối đa 255 ký tự',
            'username.unique' => 'Tên tài khoản đã tồn tại',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không hợp lệ',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu phải có tối thiểu 8 ký tự',
            'password_confirmation.required' => 'Mật khẩu không được để trống',
            'password_confirmation.same' => 'Không trùng với mật khẩu',
        ];
    }
}
