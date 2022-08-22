<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetEmailFormRequest extends FormRequest
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
            'email' => 'required|email|exists:users'
        ];
    }

    public function messages()
    {
        return [
            'required' => __('validation.required'),
            'email' => __('validation.email'),
            'exists' => __('validation.exists'),
        ];
    }

    public function attributes()
    {
        return [
            'email' => __('reset-password.email')
        ];
    }
}
