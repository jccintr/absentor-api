<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('empresas')->insert([
            'nome' => "Empresa ABC",
            'gerente_id' => 2,
            'created_at' => date("Y-m-d h:i:sa") 
        ]);
        DB::table('empresas')->insert([
            'nome' => "Microsoft Corporation",
            'gerente_id' => 3,
            'created_at' => date("Y-m-d h:i:sa") 
        ]);
    }
}
