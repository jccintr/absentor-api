<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FuncionarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('funcionarios')->insert([
            'empresa_id' => 1,
            'funcionario_id' => 2,
            'role' => 1,
           // 'gerente_id' => 2,
            'created_at' => date("Y-m-d h:i:sa") 
        ]);
    }
}
