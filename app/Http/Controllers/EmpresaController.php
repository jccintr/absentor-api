<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\User;
use App\Models\Funcionario;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::orderBy('nome')->get();
        return response()->json($empresas->values()->all(),200);
    }

    public function users($idEmpresa)
    {
     
       $funcionarios = Funcionario::select()->where('empresa_id', $idEmpresa)->get();
     
       
       foreach ($funcionarios as $funcionario){
        $user = User::find($funcionario->funcionario_id);
        if ($user) {
           $users[] = $user;
        }
       }
     
        return response()->json($users,200);
    }
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nome = $request->nome;

        if ($nome) {
            $novaEmpresa = new Empresa();
            $novaEmpresa->nome = $nome;
            $novaEmpresa->save();
            if($novaEmpresa){
               return response()->json($novaEmpresa,201);
            }
        } else {
            $array['erro'] = "Requisição mal formatada";
            return response()->json($array,400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empresa = Empresa::find($id);

        if ($empresa){
            return response()->json($empresa,200);
        } else {
            return response()->json(['erro'=>'Empresa não encontrada.'],404);
        }
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $empresa = Empresa::find($id);
        
        if ($empresa) {
            $novoNome = $request->nome;
            if ($novoNome) {
               $empresa->nome = $novoNome;
               $empresa->save();
               return response()->json($empresa,200);
            } else {
                return response()->json(['erro'=>'Campos obrigatórios não informados.'],400);
            }
        } else {
          return response()->json(['erro'=>'Empresa não encontrada.'],404);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
