<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Permetre tothom (de moment)
    }

    public function rules(): array
    {
        return [
            'titol' => 'required|min:5',
            'contingut' => 'required|min:50',
        ];
    }

    public function messages(): array
    {
        return [
            'titol.required' => 'El títol és obligatori.',
            'titol.min' => 'El títol ha de tenir almenys 5 caràcters.',
            'contingut.required' => 'El contingut és obligatori.',
            'contingut.min' => 'El contingut ha de tenir almenys 50 caràcters.',
        ];
    }
}