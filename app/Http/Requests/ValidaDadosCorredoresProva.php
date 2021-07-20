<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class ValidaDadosCorredoresProva extends FormRequest
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
            'id_corredor' => 'required|integer|exists:App\Models\Corredores,id',
            'id_prova' => 'required|integer|exists:App\Models\Provas,id'
        ];
    }


    public function messages()
    {
        return [
            'id_corredor.required' => 'id_corredor é obrigatório!',
            'id_corredor.exists' => 'id_corredor inexistente',
            'id_prova.required' => 'id_prova é obrigatório!',
            'id_prova.exists' => 'id_prova inexistente',
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $response = new JsonResponse([
            'result' => 'Error',
            'message' => 'Dados Inválidos',
            'errors' => $validator->errors()

        ], 422);

        throw new \Illuminate\Validation\ValidationException($validator, $response);
    }
}
