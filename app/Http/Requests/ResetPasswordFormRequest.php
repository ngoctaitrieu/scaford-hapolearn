<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordFormRequest extends FormRequest
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
            'email' => 'required|email|exists:users',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|same:password',
        ];
    }

    public function messages()
    {
        return [
            'required' => __('validation.required'),
            'min' => __('validation.min'),
            'email' => __('validation.email'),
            'same' => __('validation.same'),
            'exists' => __('validation.exists'),
        ];
    }

    public function attributes()
    {
        return [
            'email' => __('reset-password.email'),
            'password' => __('message.password'),
            'password_confirmation' => __('message.confirm_password')
        ];
    }
}
