<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlideStore extends FormRequest
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
            'name' => 'required|min:3|max:200',
             'image_path' => 'required|image',
             'description' => 'required',
        ];
    }
}
