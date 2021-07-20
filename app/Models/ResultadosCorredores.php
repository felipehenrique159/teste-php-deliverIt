<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultadosCorredores extends Model
{
    use HasFactory;

    protected $table = 'resultados_corredores';
    protected $connection ='mysql';
    public $timestamps = false;

    protected $fillable = [
        'id_corredor',
        'id_prova',
        'horario_inicio_prova',
        'horario_conclusao_prova'
    ];

}
