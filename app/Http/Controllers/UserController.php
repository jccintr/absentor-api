<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Funcionario;
use App\Models\Empresa;
use Monolog\Handler\RollbarHandler;

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
        
       // name,phone,doc,address,role 

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
               // $user->role = $novoRole;
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
}