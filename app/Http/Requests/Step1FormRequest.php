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
                'birthday' => 'required|date',
                'adress' => 'required|string',
                'email' => 'required|email',
                'phone' => 'required|string|regex:/^\+?[1-9]\d{1,14}$/',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ];
    }
}
