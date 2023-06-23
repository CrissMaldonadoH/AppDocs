<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TiposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tip_tipo_doc')->insert([
            'TIP_NOMBRE' => 'Instructivo',
            'TIP_PREFIJO' => 'INS'
        ]);

        DB::table('tip_tipo_doc')->insert([
            'TIP_NOMBRE' => 'Informativo',
            'TIP_PREFIJO' => 'INF'
        ]);

        DB::table('tip_tipo_doc')->insert([
            'TIP_NOMBRE' => 'Investigativo',
            'TIP_PREFIJO' => 'INV'
        ]);

        DB::table('tip_tipo_doc')->insert([
            'TIP_NOMBRE' => 'Descriptivo',
            'TIP_PREFIJO' => 'DES'
        ]);

        DB::table('tip_tipo_doc')->insert([
            'TIP_NOMBRE' => 'Expositivo',
            'TIP_PREFIJO' => 'EXP'
        ]);
    }
}
