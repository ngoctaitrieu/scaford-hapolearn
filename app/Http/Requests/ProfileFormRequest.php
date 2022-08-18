<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileFormRequest extends FormRequest
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
            'name' => 'nullable|string|max:200',
            'date_of_birth' => 'nullable',
            'address' => 'nullable|string|max:500',
            'email' => 'nullable|email|max:255|unique:users',
            'phone' => 'nullable|regex:/(0)+[0-9]{9}/|max:10',
            'about' => 'nullable|string|max:500',
            'image_upload' => 'nullable|image'
        ];
    }

    public function messages()
    {
        return [
            'max' => __('validation.max'),
            'email' => __('validation.email'),
            'unique' => __('validation.unique'),
            'regex' => __('validation.regex'),
            'image' => __('validation.image')
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên người dùng',
            'address' => 'Địa chỉ',
            'email' => 'Email',
            'phone' => 'Số điện thoại',
            'about' => 'Mô tả',
            'image_upload' => 'Hình ảnh'
        ];
    }
}
