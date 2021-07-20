<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class ValidaDadosResultadosCorredores extends FormRequest
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
            'id_prova' => 'required|integer|exists:App\Models\Provas,id',
            'horario_inicio_prova' =>  'required|date_format:"H:i:s"',
            'horario_conclusao_prova' => 'required|date_format:"H:i:s"'
        ];
    }


    public function messages()
    {
        return [
            'id_corredor.required' => 'id_corredor é obrigatório!',
            'id_corredor.exists' => 'id_corredor inexistente',
            'id_prova.required' => 'id_prova é obrigatório!',
            'id_prova.exists' => 'id_prova inexistente',
            'horario_inicio_prova.required' => 'horario_inicio_prova é obrigatório!',
            'horario_inicio_prova.date_format' => 'horario_inicio_prova deve ser no formato de hora!  Ex: 00:00:00',
            'horario_conclusao_prova.required' => 'horario_conclusao_prova é obrigatório!',
            'horario_conclusao_prova.date_format' => 'horario_conclusao_prova deve ser no formato de hora! Ex: 00:00:00',
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
