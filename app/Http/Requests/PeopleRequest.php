<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PeopleRequest extends FormRequest
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
            'name' => ['required'],
            'email' => ['required', 'unique:people,email'],
            'phone' => ['required'],
            'tel_phone' => ['required'],
            'category_id' => ['required'],
            'subcategory_id' => ['required'],
            'level_three_id' => ['required'],
            'designation' => ['required'],
        ];
    }
}
