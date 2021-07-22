<?php

namespace Database\Seeders;

use App\Models\Provas;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class ProvasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provas = new Provas;

        $provas->firstOrCreate([
            'tipo_de_prova' => '3km',
            'data' => '2021-01-01'
        ]);

        $provas->firstOrCreate([
            'tipo_de_prova' => '5km',
            'data' => '2021-01-05'
        ]);

        $provas->firstOrCreate([
            'tipo_de_prova' => '10km',
            'data' => '2021-01-10'
        ]);

        $provas->firstOrCreate([
            'tipo_de_prova' => '21km',
            'data' => '2021-01-15'
        ]);

        $provas->firstOrCreate([
            'tipo_de_prova' => '42km',
            'data' => '2021-01-15'
        ]);
    }
}
