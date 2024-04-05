<?php

namespace App\Http\Requests\Vendedor;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class CriarRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nome' => 'required|string|unique:vendedor,nome',
            'email' => 'required|string|email|unique:vendedor,email'
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'nome é obrigatório.',
            'nome.string' => 'nome deve ser string.',
            'nome.unique' => 'nome já existente, ele deve ser único.',
            'email.required' => 'email é obrigatório.',
            'email.string' => 'email deve ser string.',
            'email.unique' => 'email já existente, ele deve ser único.',
            'email.email' => 'email está inválido.'
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $response = new JsonResponse([
            'result' => 'Error',
            'message' => 'dados inválidos',
            'errors' => $validator->errors()
        ], 422);

        throw new \Illuminate\Validation\ValidationException($validator, $response);
    }
}
