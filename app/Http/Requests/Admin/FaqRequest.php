<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class FaqRequest extends FormRequest
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
                'question' => 'required|alpha_spaces|max:100',
                'answer' => 'required|alpha_spaces|max:100',
                'is_active' => 'required',
            ]; 
    }


    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'question.required' => __('validation.required', ['attribute' => 'Question']),
            // 'title.alpha_spaces' => __('validation.alpha_spaces', ['attribute' => 'Title']),
            'answer.required' => __('validation.required', ['attribute' => 'Answer']),
        ];
    }
}
