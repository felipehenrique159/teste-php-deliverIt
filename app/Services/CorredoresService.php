<?php

namespace App\Services;

use App\Models\Corredores;
use App\Models\CorredoresEmProva;
use App\Models\Provas;
use DateTime;
use Exception;

class CorredoresService
{

    public function calcularIdade($request)
    {
        $dataProva = Provas::where('id', $request['id_prova'])->first('data');
        $dataNascimento = Corredores::where('id', $request['id_corredor'])->first('data_nascimento');
        $dataNascimentoFormatada = new DateTime($dataNascimento->data_nascimento);
        $dataProvaFormatada = new DateTime($dataProva->data);
        $intervalo = date_diff($dataNascimentoFormatada, $dataProvaFormatada);
        return $intervalo->y;
    }

    public function validaDuplicataInscrição($request)
    {
        $dataProva = Provas::where('id', $request['id_prova'])->first('data');
        $datasInscritasCorredor = CorredoresEmProva::with('getDatasProvas')
            ->where('id_corredor', $request['id_corredor'])->get()
            ->pluck('getDatasProvas.data')->toArray();

        return in_array($dataProva->data, $datasInscritasCorredor);
    }
}
