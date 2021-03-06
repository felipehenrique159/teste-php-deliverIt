<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidaDadosCorredoresProva;
use App\Models\CorredoresEmProva;
use App\Services\CalcularIdadeService;
use App\Services\CorredoresService;
use Exception;
use Illuminate\Http\Request;

class ProvasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidaDadosCorredoresProva $request)
    {
        try {

            $idade = (new CorredoresService)->calcularIdade($request->all());
            if ($idade < 18) {
                throw new Exception("Menor de Idade, não pode se inscrever em prova");
            }
            $duplicata = (new CorredoresService)->validaDuplicataInscrição($request->all());
            if ($duplicata) {
                throw new Exception("Corredor já inscrito em prova no mesmo dia");
            }

            CorredoresEmProva::create($request->all());
            return  [
                'result' => 'success',
                "method" => "store",
                'message' => 'Dados gravados com sucesso',
            ];
        } catch (\Throwable $th) {
            return [
                'result' => 'error',
                "method" => "store",
                'message' => 'Erro ao inserir',
                'messageError' => $th->getMessage(),
            ];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
