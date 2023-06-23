<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProcesosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pro_proceso')->insert([
            'PRO_PREFIJO' => 'ING',
            'PRO_NOMBRE' => 'Ingeniería'
        ]);

        DB::table('pro_proceso')->insert([
            'PRO_PREFIJO' => 'TEST',
            'PRO_NOMBRE' => 'Testing'
        ]);

        DB::table('pro_proceso')->insert([
            'PRO_PREFIJO' => 'PROD',
            'PRO_NOMBRE' => 'Producción'
        ]);

        DB::table('pro_proceso')->insert([
            'PRO_PREFIJO' => 'MKG',
            'PRO_NOMBRE' => 'Marketing'
        ]);

        DB::table('pro_proceso')->insert([
            'PRO_PREFIJO' => 'CONT',
            'PRO_NOMBRE' => 'Contabilidad'
        ]);
    }
}
