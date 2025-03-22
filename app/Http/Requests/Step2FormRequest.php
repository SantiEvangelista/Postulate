<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Step2FormRequest extends FormRequest
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
            'secundario' => 'required',
            'orientacion' => 'required',
            'fecha_inicio_secundario' => 'required',
            'terciaria' => 'required',
            'orientacion_terciaria' => 'required',
            'fecha_inicio_terciaria' => 'required'
        ];
    }
}
