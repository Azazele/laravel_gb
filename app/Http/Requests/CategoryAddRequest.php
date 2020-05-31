<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryAddRequest extends FormRequest
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
            'title' => 'required|min:3|max:50|unique:cats,title|alpha_dash',
            'description' => 'min:10|max:255'
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'название категории',
            'description' => 'описание категории'
        ];
    }
}
