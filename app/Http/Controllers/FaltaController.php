<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Falta;
use Illuminate\Support\Facades\Storage;



class FaltaController extends Controller
{

    public function index($idFuncionario,$ano,$mes)
    {

     
        $faltas = Falta::whereYear('data',$ano)
                         ->whereMonth('data', $mes)
                         ->where('funcionario_id',$idFuncionario)
                         ->orderby('data')
                         ->get();
       
        foreach($faltas as $falta){
            $falta->dia_mes = date('d',strtotime($falta->data))*1;
            $falta->dia_semana = date('w',strtotime($falta->data))*1;
        }

        return response()->json($faltas->values()->all(),200);
    }

    public function store(Request $request)
    {
        $empresa_id = $request->empresa_id;
        $funcionario_id = $request->funcionario_id;
        $data = $request->data;
        $dias = $request->dias;
        $motivo = $request->motivo;
        $data =  date("Y-m-d",strtotime($data));
        $anexo = $request->file('anexo');


        if ($empresa_id and $funcionario_id and $data and $dias and $motivo) {
            for($d=0;$d<$dias;$d++){
              $novaFalta = new Falta();
              $novaFalta->empresa_id = $empresa_id;
              $novaFalta->funcionario_id = $funcionario_id;
              $novaFalta->data =date("Y-m-d", strtotime("+".$d." day", strtotime($data) ) );
              $novaFalta->motivo = $motivo;
              if($anexo) {
                $anexo_url = $anexo->store('anexos','public');
                $novaFalta->anexo = $anexo_url;
              }
              $novaFalta->save();
            }

            if($novaFalta){
               $array['sucesso'] = "Falta(s) registradas com sucesso!";
               return response()->json($array,201);
            }
        } else {
            $array['erro'] = "Requisição mal formatada!";
            return response()->json($array,400);
        }
    }


}
