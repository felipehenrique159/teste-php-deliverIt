<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidaDadosResultadosCorredores;
use App\Models\ResultadosCorredores;
use App\Services\CorredoresService;
use App\Services\ResultadosCorredorService;
use Illuminate\Http\Request;

class ResultadosCorredoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            return (new ResultadosCorredorService)->listarTodosResultados();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function listarResultadosFiltroIdade()
    {
        try {
            return (new ResultadosCorredorService)->listarResultadosAgrupados();
        } catch (\Throwable $th) {
            $th->getMessage();
        }
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
    public function store(ValidaDadosResultadosCorredores $request)
    {
        try {
            ResultadosCorredores::create($request->all());
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
