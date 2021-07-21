<?php

namespace App\Services;

use App\Models\ResultadosCorredores;
use Carbon\Carbon;

class ResultadosCorredorService
{

    public function calcularIntervalo($horaInicio, $horaFim)
    {
        $horaInicio = Carbon::parse($horaInicio);
        $horaFim   = Carbon::parse($horaFim);
        return $horaInicio->diff($horaFim)->format('%H:%I:%S');
    }

    public function listarTodosResultados()
    {
        $resultadosCorredor = ResultadosCorredores::all();
        $resultados = [];
        foreach ($resultadosCorredor as $resultadosCorredor) {

            $intervaloTempoProva = $this->calcularIntervalo($resultadosCorredor->horario_inicio_prova, $resultadosCorredor->horario_conclusao_prova);
            $dadosCorredor = [
                'id_corredor' => $resultadosCorredor->getCorredor->id,
                'id_prova' => $resultadosCorredor->getProva->id
            ];
            $dataNascimento = (new CorredoresService)->calcularIdade($dadosCorredor);
            $dadosCorredor = [
                'nome_corredor' => $resultadosCorredor->getCorredor->nome,
                'idade_corredor' => $dataNascimento,
                'tipo_de_prova' => $resultadosCorredor->getProva->tipo_de_prova,
                'data_prova' => $resultadosCorredor->getProva->data,
                'tempo_prova' => $intervaloTempoProva
            ];
            array_push($resultados, $dadosCorredor);
            
        }

        return $resultados;
    }
}
