<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'title' => 'required|max:255',
            'description' => 'required',
            'author_id' => 'required'
        ];
    }

    /**
     * Customize error messages for specific rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'O campo título é obrigatório.',
            'title.max:255' => 'O título deve ter no máximo 255 caracteres.',
            'description.required' => 'O campo descrição é obrigatório.',
            'author_id.required' => 'O campo autor é obrigatório.',
        ];
    }
}