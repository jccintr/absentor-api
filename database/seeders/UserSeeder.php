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

      // admin => André Paulo
      //Gerente => Carlos Pinto
      //funcionario => Edson Lincoln
      //funcionario => Susana Alves


      DB::table('users')->insert([
        'name' => "André Paulo",
        'email' => "andre@gmail.com",
        'phone' => "35-99912-2008",
        'doc' => "02763236",
        'address' => "Rua abc, 23 - Paladino - São Paulo",
        'password' => password_hash('123', PASSWORD_DEFAULT),
        'active' => true,
        'created_at' => date("Y-m-d h:i:sa"),
        'isAdmin' => true
    ]);

    DB::table('users')->insert([
        'name' => "Carlos Pinto",
        'email' => "carlos@gmail.com",
        'phone' => "12-98653-2500",
        'doc' => "12345",
        'address' => "Av. Itália, 525 - Santa Tereza - Taubaté",
        'password' => password_hash('123', PASSWORD_DEFAULT),
        'active' => true,
        'isAdmin' => false,
        'created_at' => date("Y-m-d h:i:sa")
    ]);

    DB::table('users')->insert([
        'name' => "Edson Lincoln",
        'email' => "edson@gmail.com",
        'phone' => "12-98653-3000",
        'doc' => "12656345",
        'address' => "Av. Itália, 525 - Santa Tereza - Taubaté",
        'password' => password_hash('123', PASSWORD_DEFAULT),
        'active' => true,
        'isAdmin' => false,
        'created_at' => date("Y-m-d h:i:sa")
    ]);

    DB::table('users')->insert([
        'name' => "Susana Alves",
        'email' => "susana@gmail.com",
        'phone' => "12-98653-1320",
        'doc' => "xxx8555",
        'address' => "Av. Itália, 525 - Santa Tereza - Taubaté",
        'password' => password_hash('123', PASSWORD_DEFAULT),
        'active' => true,
        'isAdmin' => false,
        'created_at' => date("Y-m-d h:i:sa")
    ]);


//==========================================
    /*     DB::table('users')->insert([
            'name' => "Julio Cesar",
            'email' => "jccintr@gmail.com",
            'phone' => "35-99912-2008",
            'doc' => "027611",
            'address' => "Rua abc, 23 - Paladino - São Paulo",
            'password' => password_hash('123', PASSWORD_DEFAULT),
            'active' => true,
            'created_at' => date("Y-m-d h:i:sa"),
            'isAdmin' => true
        ]);
        DB::table('users')->insert([
            'name' => "Joyce",
            'email' => "joyce@gmail.com",
            'phone' => "12-98653-2500",
            'doc' => "12345",
            'address' => "Av. Itália, 525 - Santa Tereza - Taubaté",
            'password' => password_hash('123', PASSWORD_DEFAULT),
            'active' => true,
            'isAdmin' => false,
            'created_at' => date("Y-m-d h:i:sa")
        ]);

        DB::table('users')->insert([
            'name' => "Elisa",
            'email' => "elisa@gmail.com",
            'phone' => "21-98632-3262",
            'doc' => "12345",
            'address' => "Av. Marques de Sapucaí, 345 - Rio de Janeiro",
            'password' => password_hash('123', PASSWORD_DEFAULT),
           // 'role' => 2,
            'active' => true,
            'isAdmin' => false,
            'created_at' => date("Y-m-d h:i:sa")
        ]);

 */

    }
}
