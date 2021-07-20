<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provas extends Model
{
    use HasFactory;

    protected $table = 'provas';
    protected $connection ='mysql';
    public $timestamps = false;

    protected $fillable = [
        'tipo_de_prova',
        'data',
    ];

}
