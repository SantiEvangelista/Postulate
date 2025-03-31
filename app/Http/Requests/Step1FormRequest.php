<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Step1FormRequest extends FormRequest
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
                'name' => 'required|string|regex:/^[a-zA-Z\s]+$/',
                'surname' => 'required|string|regex:/^[a-zA-Z\s]+$/',
                'birthday' => 'required|date|before:' . now()->subYears(16)->format('Y-m-d'),
                'adress' => 'required|string',
                'email' => 'required|email',
                'phone' => 'required|string',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ];
    }

    public function messages()
    {
        return [
            'name.regex' => 'El nombre debe contener solo letras.',
            'surname.regex' => 'El apellido debe contener solo letras.',
            'email.email' => 'El email no es valido.',
            'phone.regex' => 'El telefono no es valido.',
            'birthday.before' => 'Debes tener al menos 16 años para crear un CV.',
        ];
    }
}
