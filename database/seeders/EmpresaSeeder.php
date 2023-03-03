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
            'nome' => "Garagem Gondomar",
            'email' => "contato@garagemgondomar.pt",
            'phone' => "351 6532 3236",
            'address' => "Alameda Santos, 35 - Gondomar"
         ]);
     
    }
}
