<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\DB;

class Resultado_programasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function insertRs(Request $request){
        $insertaResultado = new App\Resultado_competencia();
        $insertaResultado -> Result_Nombre = $request->Result_Nombre;
        $insertaResultado -> Result_Estado = '1';
        $insertaResultado ->competencias_id = $request->competencias_id;
        $insertaResultado->save();
        return redirect('resultado_competencias/lista');

    }


    public function viewC(){
        if($r = auth()->user()->rol == 'Administrador'){
            $k = auth()->user()->email;
            $ver = DB::table('instructors')
            ->where('instructors.Instruct_EmailAlternativo','=',$k)
            ->get();
            $infoPrograma = App\Competencias::All();
            return view('resultado_competencias/index',compact('infoPrograma','ver'));
        }


    }
    public function verl(){
        if($r = auth()->user()->rol == 'Administrador'){
            $k = auth()->user()->email;
            $ver = DB::table('instructors')
            ->where('instructors.Instruct_EmailAlternativo','=',$k)
            ->get();
            $verR =  App\Resultado_competencia::All();
            $infoPrograma = App\Competencias::All();
            return view('resultado_competencias/lista',compact('verR','infoPrograma','ver'));
        }

        if($r = auth()->user()->rol == 'Aprendiz'){
            return view('Estudiante.resultados.index');
        }

        if($r = auth()->user()->rol == 'Instructor'){
            return view('maestros.resultados.index');
        }
    }



    public function resultjson(){
        $verr = DB::table('Resultado_competencias')
        ->join('competencias','Resultado_competencias.id','competencias.id')
        ->select('Resultado_competencias.id','Resultado_competencias.Result_Nombre','Resultado_competencias.Result_Estado','competencias.Compet_Nombre')
        ->get();
        $datos = array('data' => $verr);
        return $datos;
    }

    public function deleteR($id){
        $deleteResultado_competencia = App\Resultado_competencia::FindOrFail($id);
        $deleteResultado_competencia->delete();
        return redirect('resultado_competencias/lista');
    }
    public function updateR($id){
        if($r = auth()->user()->rol == 'Administrador'){
            $k = auth()->user()->email;
            $ver = DB::table('instructors')
            ->where('instructors.Instruct_EmailAlternativo','=',$k)
            ->get();
            $infoPrograma = App\Competencias::All();
            $updateR = App\Resultado_competencia::FindOrFail($id);
            return view('resultado_competencias/actualizar',compact('updateR','infoPrograma','ver'));
        }

    }
    public function updateBDR(Request $request){
        $actualizarR = App\Resultado_competencia::FindOrFail($request->id);
        $actualizarR -> Result_Nombre = $request->Result_Nombre;
        $actualizarR -> Result_Estado = $request->Result_Estado;
        $actualizarR ->competencias_id = $request->competencias_id;
        $actualizarR->update();
        return redirect('resultado_competencias/lista');
    }
}
