<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewFormRequest extends FormRequest
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
            'message' => 'required|string|max:500',
            'course_id' => 'required|integer',
            'parent_id' => 'nullable|integer',
            'rate' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'required' => __('validation.required'),
            'max' => __('validation.max'),
        ];
    }

    public function attributes()
    {
        return [
            'message' => __('course-detail.message'),
            'rate' => __('course-detail.reviews')
        ];
    }
}
