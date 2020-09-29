<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'ar.name' => 'required|min:3|max:255',
            'en.name' => 'required|min:3|max:255',
            'ar.description' => 'required|min:3|max:255',
            'en.description' => 'required|min:3|max:255',
            "image.*" => "required|image"
        ];
    }

    public function messages()
    {
        return[ //              This field is required.    This field must be at least 3 characters
                       /////    This field may not be greater than 141 characters
            'ar.name.required' => 'This Name field is required.',
            'ar.name.min' => 'This field must be at least 3 characters',
            'ar.name.max' => 'This field may not be greater than 141 characters',
            'en.name.required' => 'This field is required.',
            'en.name.min' => 'This field must be at least 3 characters',
            'en.name.max' => 'This field may not be greater than 141 characters',
            'ar.description.required' => 'This field is required.',
            'ar.description.min' => 'This field must be at least 3 characters',
            'ar.description.max' => 'This field may not be greater than 141 characters',
            'en.description.required' => 'This field is required.',
            'en.description.min' => 'This field must be at least 3 characters',
            'en.description.max' => 'This field may not be greater than 141 characters',
            "image.required" => "This field is required.",
            "image.image" => "This image must be valid image type. [png,jpg,jpeg ,gif]",
        ];

    }
}
