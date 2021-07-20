<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Corredores extends Model
{
    use HasFactory;


    protected $table = 'corredores';
    protected $connection ='mysql';
    public $timestamps = false;

    protected $fillable = [
        'nome',
        'cpf',
        'data_nascimento'
    ];

    

}
