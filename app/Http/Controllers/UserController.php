<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Funcionario;
use App\Models\Empresa;
use Monolog\Handler\RollbarHandler;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
  public function index()
  {
      $users = User::orderBy('name')->get();
      return response()->json($users->values()->all(),200);
  }

  public function show($id)
  {
      $user = User::find($id);

      if ($user){
          $funcionario = Funcionario::select()->where('funcionario_id', $id)->first();
          $user->role = $funcionario->role;
          $empresa = Empresa::find($funcionario->empresa_id);
          $user->empresa = $empresa;
          return response()->json($user,200);
      } else {
          return response()->json(['erro'=>'Usuário não encontrado.'],404);
      }
  }

  public function update(Request $request, $id)
  {
      $user = User::find($id);

      if ($user){
          $novoNome = $request->name;
          $novoPhone = $request->phone;
          $novoDoc = $request->doc;
          $novoAddress = $request->address;
          $novoRole = $request->role;
          if($novoNome) {
              $user->name = $novoNome;
              $user->phone = $novoPhone;
              $user->doc = $novoDoc;
              $user->address = $novoAddress;
              $user->save();
              $user->role = $novoRole;
              $funcionario = Funcionario::select()->where('funcionario_id', $id)->first();
              $funcionario->role = $novoRole;
              $funcionario->save();
              $empresa = Empresa::find($funcionario->empresa_id);
              $user->empresa = $empresa;
              return response()->json($user,200);
          } else {
              return response()->json(['erro'=>'Campos obrigatórios não informados.'],400);
          }
      } else {
          return response()->json(['erro'=>'Usuário não encontrado.'],404);
      }

  }

  public function avatar($id,Request $request){

      $avatar = $request->file('avatar');
      $user = User::find($id);

      if (!$user) {
          return response()->json(['erro'=>'Usuário não encontrado.'],404);
      }

      if ($user->avatar) {
          Storage::disk('public')->delete($user->avatar);
      }
      $avatar_url = $avatar->store('avatar','public');
      $user->avatar = $avatar_url;
      $user->save();
      return response()->json($user,200);

    }

  public function password($id,Request $request){

    $senha = $request->senha;
    $novaSenha = $request->novaSenha;

    if($senha and $novaSenha) {
        $usuario = User::find($id);

        if(!password_verify($senha, $usuario->password)) {
            $array['erro'] = "Senha de acesso inválida.";
            return response()->json($array,401);
        }
        $password_hash = password_hash($novaSenha, PASSWORD_DEFAULT);
        $usuario->password = $password_hash;
        $usuario->save();
        $array['sucesso'] = "Senha alterado com sucesso.";
        return response()->json($array,200);
    } else {
      $array['erro'] = "Campos obrigatórios não informados.";
      return response()->json($array,400);
    }

  }

}
