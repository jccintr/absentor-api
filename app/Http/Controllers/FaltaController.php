<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Falta;



class FaltaController extends Controller
{

    public function index()
    {
        $faltas = Falta::orderBy('data')->get();
        return response()->json($faltas->values()->all(),200);
    }
   
    public function store(Request $request)
    {
        $empresa_id = $request->empresa_id;
        $funcionario_id = $request->funcionario_id;
        $data = $request->data;
        $dias = $request->dias;
        $motivo = $request->motivo;



      
        if ($empresa_id and $funcionario_id and $data and $dias and $motivo) {
            $novaFalta = new Falta();
            $novaFalta->empresa_id = $empresa_id;
            $novaFalta->funcionario_id = $funcionario_id;
            $novaFalta->data = $data;
            $novaFalta->dias = $dias;
            $novaFalta->motivo = $motivo;
            $novaFalta->save();
            $arrDias = [];
                     
            for($d=0;$d<$dias;$d++){
             
                array_push( $arrDias, date("Y-m-d", strtotime("+".$d." day", strtotime($data) ) ) );
               
            }
         
            $novaFalta->faltas = $arrDias;
            if($novaFalta){
               return response()->json($novaFalta,201);
            }
        } else {
            $array['erro'] = "Requisição mal formatada";
            return response()->json($array,400);
        }
    }


}
