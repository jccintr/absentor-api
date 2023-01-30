<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "Julio Cesar",
            'email' => "jccintr@gmail.com",
            'phone' => "35-99912-2008",
            'doc' => "027611",
            'address' => "Rua abc, 23 - Paladino - São Paulo",
            'password' => password_hash('123', PASSWORD_DEFAULT),
            'role' => 0,
            'active' => true,
            'created_at' => date("Y-m-d h:i:sa") 
        ]);
        DB::table('users')->insert([
            'name' => "Joyce",
            'email' => "joyce@gmail.com",
            'phone' => "12-98653-2500",
            'doc' => "12345",
            'address' => "Av. Itália, 525 - Santa Tereza - Taubaté",
            'password' => password_hash('123', PASSWORD_DEFAULT),
            'role' => 1,
            'active' => true,
            'created_at' => date("Y-m-d h:i:sa") 
        ]);
        DB::table('users')->insert([
            'name' => "Bill Gates",
            'email' => "bill@microsoft.com",
            'phone' => "11-98653-2500",
            'doc' => "12345",
            'address' => "Av. Brasil, 525 - Centro - São Paulo",
            'password' => password_hash('123', PASSWORD_DEFAULT),
            'role' => 1,
            'active' => true,
            'created_at' => date("Y-m-d h:i:sa") 
        ]);
        DB::table('users')->insert([
            'name' => "Elizabeth Tabish",
            'email' => "elizabeth@microsoft.com",
            'phone' => "21-98632-3262",
            'doc' => "12345",
            'address' => "Av. Marques de Sapucaí, 345 - Rio de Janeiro",
            'password' => password_hash('123', PASSWORD_DEFAULT),
            'role' => 2,
            'active' => true,
            'created_at' => date("Y-m-d h:i:sa") 
        ]);


    }
}
