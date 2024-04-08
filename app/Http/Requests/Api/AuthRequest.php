<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => [
                'required',
                'email',
                'max:255'
            ],
            'password' => [
                'required',
                'max:255'
            ],
            'device_name' => [
                'required',
                'max:255'
            ]
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
            'email.required' => 'O campo de e-mail é obrigatório.',
            'email.email' => 'O e-mail fornecido não é válido.',
            'email.max:255' => 'O e-mail deve ter no máximo 255 caracteres.',
            'password.required' => 'O campo de senha é obrigatório.',
            'password.max:255' => 'A senha deve ter no máximo 255 caracteres.',
            'device_name.required' => 'O campo dispositivo é obrigatório.',
            'device_name.max:255' => 'O dispositivo deve ter no máximo 255 caracteres.'
        ];
    }

}