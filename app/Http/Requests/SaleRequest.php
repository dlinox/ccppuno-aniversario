<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            // Validaciones para la sección "person"
            'person.documentNumber' => 'required|numeric|digits:8',
            'person.name' => 'required|string|max:255',
            'person.paternalSurname' => 'required|string|max:255',
            'person.maternalSurname' => 'required|string|max:255',
            'person.email' => 'required|email|max:255',
            'person.phoneNumber' => 'required|numeric|digits:9',
            'person.enrollmentNumber' => 'nullable|numeric|digits:6',

            // Validaciones para la sección "tickets"
            'tickets.qualityHabil' => 'required|integer|min:0',
            'tickets.qualityInHabil' => 'required|integer|min:0',

            // Validaciones para la sección "pay"
            'pay.code' => 'required',
            'pay.amount' => 'required|numeric|min:0',
            'pay.date' => 'required|date',
            'pay.image' => 'nullable|image|max:2048', // Suponiendo que "image" es una imagen y no debe exceder 2MB.
        ];;
    }

    public function messages()
    {
        return [
            // Mensajes personalizados para la sección "person"
            'person.documentNumber.required' => 'El número de documento es obligatorio.',
            'person.documentNumber.numeric' => 'El número de documento sólo debe contener números.',
            'person.documentNumber.digits' => 'El número de documento debe tener exactamente 8 dígitos.',
            'person.name.required' => 'El nombre es obligatorio.',
            'person.paternalSurname.required' => 'El apellido paterno es obligatorio.',
            'person.maternalSurname.required' => 'El apellido materno es obligatorio.',
            'person.email.required' => 'El correo electrónico es obligatorio.',
            'person.email.email' => 'Ingresa un correo electrónico válido.',
            'person.phoneNumber.required' => 'El número de teléfono es obligatorio.',
            'person.phoneNumber.numeric' => 'El número de teléfono sólo debe contener números.',
            'person.phoneNumber.digits' => 'El número de teléfono debe tener exactamente 9 dígitos.',

            // Mensajes personalizados para la sección "tickets"
            'tickets.qualityHabil.required' => 'La cantidad de tickets hábiles es obligatoria.',
            'tickets.qualityHabil.integer' => 'La cantidad de tickets hábiles debe ser un número entero.',
            'tickets.qualityInHabil.required' => 'La cantidad de tickets inhábiles es obligatoria.',
            'tickets.qualityInHabil.integer' => 'La cantidad de tickets inhábiles debe ser un número entero.',

            // Mensajes personalizados para la sección "pay"
            'pay.code.required' => 'La serie de pago es Obligatorio.',
            'pay.amount.required' => 'El monto de pago es obligatorio.',
            'pay.date.required' => 'La fecha de pago es obligatoria.',
            'pay.date.date' => 'Ingresa una fecha válida.',
            'pay.image.image' => 'Asegúrate de subir una imagen válida.',
            'pay.image.max' => 'La imagen no debe exceder de 2MB.',
        ];
    }
}
