<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Funcionario;
use App\Models\Empresa;

class LoginController extends Controller
{
//============================================================
// Loga usuario
//============================================================
public function signIn(Request $request){

    $email = filter_var($request->email,FILTER_VALIDATE_EMAIL);
    $password = $request->password;

    if(!$email or !$password) {
        $array['erro'] = "Nome de usuário e ou senha inválidos";
        return response()->json($array,401);
    }

    $user = User::select()->where('email', $email)->first();
    if(!$user) {
        $array['erro'] = "Nome de usuário e ou senha inválidos";
        return response()->json($array,401);
    }

    if(!password_verify($password, $user->password)) {
        $array['erro'] = "Nome de usuário e ou senha inválidos";
        return response()->json($array,401);
    }

    $token =  md5(time().rand(0,9999).time());
    $user->token = $token;
    $user->save();

    if (!$user->isAdmin){

        $funcionario = Funcionario::select()->where('funcionario_id', $user->id)->first();
        if ($funcionario) {
          $empresa = Empresa::find($funcionario->empresa_id);
          $user->role = $funcionario->role;
          $user->empresa = $empresa;
        } else {
            $user->empresa = null;
        }
    } else {
        $user->role = 0;
        $user->empresa = null;
    }



    return response()->json($user,200);
}

}
