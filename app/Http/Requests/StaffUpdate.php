<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaffUpdate extends FormRequest
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
            'name' => 'required|min:2|max:200',
            'email' => 'email',
            'password' => 'min:2|max:20',
            'role' => 'required'
        ];
    }
}
