<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorredoresEmProva extends Model
{
    use HasFactory;

    protected $table = 'corredores_em_prova';
    protected $connection ='mysql';
    public $timestamps = false;

    protected $fillable = [
        'id_corredor',
        'id_prova',
    ];

    public function getDatasProvas()
    {
        return $this->hasOne(Provas::class,'id','id_prova');
    }

}
