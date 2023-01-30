<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class CadastroController extends Controller
{

    
    public function signUp(Request $request) {


        $name = $request->name;
        $email = filter_var($request->email,FILTER_VALIDATE_EMAIL);
        $password = $request->password;
       
    
    
        if($name && $email && $password) {
            $user = User::select()->where('email', $email)->first();
            if($user) {
                $array['erro'] = "Email já cadastrado.";
                return response()->json($array,400);
            }
    
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $token = md5(time().rand(0,9999).time());
    
            $newUser = new User();
            $newUser->name = $name;
            $newUser->email = $email;
            $newUser->password = $password_hash;
            $newUser->telefone = $telefone;
            $newUser->role =  'cliente';
            $newUser->token = $token;
            $newUser->save();
            if($newUser){
                return response()->json($newUser,201);
            }
         }
    
    }
}

/*
$table->string('name');
$table->string('email')->unique();
$table->string('phone')->nullable();
$table->string('doc')->nullable();
$table->string('address')->nullable();
$table->string('password');
$table->integer('role')->default(2);  // 0-admin 1-gerente 2-funcionario
$table->boolean('active')->default(true);
*/