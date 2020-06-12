<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'title' => 'required|min:10|max:150',
            'content' => 'required',
            'cats' => 'required|array',
            'is_private' => 'required|integer|min:0|max:1'
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'заголовок новости',
            'content' => 'содержание новости',
            'cats' => 'категории',
            'is_private' => 'приватность'
        ];
    }
}
