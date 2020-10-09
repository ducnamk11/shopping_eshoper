<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProduct extends FormRequest
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
            'price' => 'required|numeric|min:1000',
            'feature_image_path' => 'required|image',
            'image_path' => 'required',
            'category_id' => 'required',
            'tags' => 'required',
            'content' => 'required',
        ];
    }
}
