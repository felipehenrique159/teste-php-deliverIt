<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidaDadosCorredor;
use App\Models\Corredores;
use App\Services\CalcularIdadeService;
use Illuminate\Http\Request;

class CorredoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Corredores::all();
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
    public function store(ValidaDadosCorredor $request)
    {   

        try {
            Corredores::create($request->all());
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
