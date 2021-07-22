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

        return collect($resultados);
    }

    public function listarPorIdade()
    {
        $resultados = $this->listarTodosResultados();
        $collectionResultados = collect($resultados);

        $classificacao18to25 = $this->filtrarIdadeCollection($collectionResultados, 18, 25);
        $classificacao25to35 = $this->filtrarIdadeCollection($collectionResultados, 25, 35);
        $classificacao35to45 = $this->filtrarIdadeCollection($collectionResultados, 35, 45);
        $classificacao45to55 = $this->filtrarIdadeCollection($collectionResultados, 45, 55);
        $classificacaoMaiorQue55 = $this->filtrarIdadeCollection($collectionResultados, 55);

        $tiposProva = ['3km', '5km', '10km', '21km', '42km'];
        $retorno = [];
        foreach ($tiposProva as $tipo) {
            $gruposIdade = [
                'prova_' . $tipo => [
                    '18-25_anos' => $this->adicionaClassificacao($classificacao18to25->where('tipo_de_prova', $tipo)),
                    '25-35_anos' => $this->adicionaClassificacao($classificacao25to35->where('tipo_de_prova', $tipo)),
                    '35-45_anos' => $this->adicionaClassificacao($classificacao35to45->where('tipo_de_prova', $tipo)),
                    '45-55_anos' => $this->adicionaClassificacao($classificacao45to55->where('tipo_de_prova', $tipo)),
                    'Acima_de_55 anos' => $this->adicionaClassificacao($classificacaoMaiorQue55->where('tipo_de_prova', $tipo)),
                ],
            ];

            array_push($retorno, $gruposIdade);
        }

        return $retorno;
    }

    public function filtrarIdadeCollection($collection, $idadeInicio, $idadeFim = null)
    {
        if (is_null($idadeFim)) {
            $idadeFim = 100;
        }
        return $collection->whereBetween('idade_corredor', [$idadeInicio, $idadeFim])
            ->sortBy('idade_corredor')
            ->sortBy('tempo_prova');
    }

    public function adicionaClassificacao($classificacao)
    {
        $count = 1;
        $array = [];
        foreach ($classificacao as $classifica) {
            $classifica['posicao'] = $count . 'º';
            $count++;
            array_push($array, $classifica);
        }
        return collect($array);
    }
}
