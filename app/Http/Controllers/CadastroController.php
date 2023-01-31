<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Empresa;
use App\Models\Funcionario;

class CadastroController extends Controller
{

    
    public function signUp(Request $request) {


        $name = $request->name;
        $email = filter_var($request->email,FILTER_VALIDATE_EMAIL);
        $password = $request->password;
        $phone = $request->phone;
        $doc = $request->doc;
        $address = $request->address;
        $role = $request->role;
        $empresa_id = $request->empresa_id;
    
        if($name && $email && $password && $role && $empresa_id) {
            $user = User::select()->where('email', $email)->first();
            if($user) {
                $array['erro'] = "Email já cadastrado.";
                return response()->json($array,400);
            }
    
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $token = md5(time().rand(0,9999).time());
    
            // buscar pela empresa;
            $empresa = Empresa::find($empresa_id);
            
            //====================================
            $newUser = new User();
            $newUser->name = $name;
            $newUser->email = $email;
            $newUser->password = $password_hash;
            $newUser->phone = $phone;
            $newUser->doc = $doc;
            $newUser->address = $address;
            $newUser->role =  $role;
            $newUser->token = $token;
            $newUser->save();
            
            if($newUser){
                $newUser->empresa = $empresa;
                // vincular o usuario a aquela empresa;
                $funcionario = new Funcionario();
                $funcionario->empresa_id = $empresa_id;
                $funcionario->funcionario_id = $newUser->id;
                $funcionario->save();
                return response()->json($newUser,201);
            }
         }
    
    }
}
