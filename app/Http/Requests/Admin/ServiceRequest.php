<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
        if (!request()->is('admin/services/create')) {
            return [
                'title' => 'required|alpha_spaces|max:20',
                'image' => 'nullable|image',
            ];
        } else {
            return [
                'title' => 'required|alpha_spaces|max:20',
                'image' => 'required|image',
            ];
        }
    }


    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => __('validation.required', ['attribute' => 'Title']),
            // 'title.alpha_spaces' => __('validation.alpha_spaces', ['attribute' => 'Title']),
            'image.required' => __('validation.required', ['attribute' => 'Image']),
        ];
    }
}
