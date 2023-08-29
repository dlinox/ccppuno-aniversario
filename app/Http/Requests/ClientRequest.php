<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'maternalSurname' => 'nullable|string|max:255',
            'paternalSurname' => 'nullable|string|max:255',
            'documentNumber' => 'required|string|size:8|unique:clients,documentNumber',
            'phoneNumber' => 'required|string|size:9',
            'enrollmentNumber' => 'nullable|string|size:6|unique:clients,enrollmentNumber',
            'hasEnrollment' => 'required|boolean',
            'email' => 'required|email|max:255',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es obligatorio.',
            'documentNumber.required' => 'El número de documento es obligatorio.',
            'documentNumber.numeric' => 'El número de documento sólo debe contener números.',
            'documentNumber.digits' => 'El número de documento debe tener exactamente 8 dígitos.',
            'documentNumber.unique' => 'El número de documento ya está registrado.',
            'enrollmentNumber.numeric' => 'El número de matrícula sólo debe contener números.',
            'enrollmentNumber.digits' => 'El número de matrícula debe tener exactamente 6 dígitos.',
            'enrollmentNumber.unique' => 'El número de matrícula ya está registrado.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Ingresa un correo electrónico válido.',
        ];
    }
}
