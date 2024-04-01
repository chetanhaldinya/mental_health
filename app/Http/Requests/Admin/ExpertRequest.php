<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ExpertRequest extends FormRequest
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
        if (!request()->is('admin/experts/create')) {
            return [
                'name' => 'required|alpha_spaces|max:20',
                'surname' => 'required|alpha_spaces|max:20',
                'gender' => 'required',
                'about' => 'required|min:20|max:200',
                'designation' => 'required',
                'qualification' => 'required',
                'image' => 'nullable|image',
                'fees' => 'required|max:10',
            ];
        } else {
            return [
                'name' => 'required|alpha_spaces|max:20',
                'surname' => 'required|alpha_spaces|max:20',
                'gender' => 'required',
                'about' => 'required|min:20|max:200',
                'designation' => 'required',
                'qualification' => 'required',
                'image' => 'required|image',
                'fees' => 'required|max:10',
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
            'name.required' => __('validation.required', ['attribute' => 'Name']),
            // 'title.alpha_spaces' => __('validation.alpha_spaces', ['attribute' => 'Title']),
            'surname.required' => __('validation.required', ['attribute' => 'Surname']),
            'gender.required' => __('validation.required', ['attribute' => 'Gender']),
            'about.required' => __('validation.required', ['attribute' => 'About']),
            'designation.required' => __('validation.required', ['attribute' => 'Designation']),
            'qualification.required' => __('validation.required', ['attribute' => 'Qualification']),
            'image.required' => __('validation.required', ['attribute' => 'Image']),
            'fees.required' => __('validation.required', ['attribute' => 'Fees']),

        ];
    }
}
