<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\DB;

class CompetenciaHasRutaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        if($r = auth()->user()->rol == 'Administrador'){
            $k = auth()->user()->email;
            $ver = DB::table('instructors')
            ->where('instructors.Instruct_EmailAlternativo','=',$k)
            ->get();
            $verR = app\Resultado_competencia::all();
            $verC = app\Competencias::all();
            $verD = app\Detalle_ruta::all();
            return view('Competencias_has_Ruta.index',compact('verR','verC','verD','ver'));
        }

    }

    public function indexL(){
        if($r = auth()->user()->rol == 'Administrador'){
            $k = auth()->user()->email;
            $ver = DB::table('instructors')
            ->where('instructors.Instruct_EmailAlternativo','=',$k)
            ->get();
            $verl = App\Competencias_Has_Detalle_Ruta::all();
            return view('Competencias_has_Ruta.lista', compact('verl','ver'));
        }

    }

    public function resultjson(){
        $verr = App\Competencias_Has_Detalle_Ruta::All();
        $datos = array('data' => $verr);
        return $datos;
    }

    public function GuardarCompetencia(Request $request){
        $GuardarC = new app\Competencias_Has_Detalle_Ruta();
        $GuardarC->resultadoCompetenciaId = $request->resultadoCompetenciaId;
        $GuardarC->CompetenciasId = $request->CompetenciasId;
        $GuardarC->DetalleRutaId = $request->DetalleRutaId;
        $GuardarC->save();

        return redirect('Competencias_has_Ruta/lista');

    }
    public function deleteCDR($id){
        $deleteDetalleR = App\Competencias_Has_Detalle_Ruta::FindOrFail($id);
        $deleteDetalleR->delete();
        return redirect('Competencias_has_Ruta/lista');
    }
    public function updateCDR($id){
        if($r = auth()->user()->rol == 'Administrador'){
            $k = auth()->user()->email;
            $ver = DB::table('instructors')
            ->where('instructors.Instruct_EmailAlternativo','=',$k)
            ->get();
            $verR = app\Resultado_competencia::all();
            $verC = app\Competencias::all();
            $verD = app\Detalle_ruta::all();
            $verF = App\Ruta_Formacion::all();
            $updateDetalleR = App\Competencias_Has_Detalle_Ruta::FindOrFail($id);
            return view('Competencias_has_Ruta.actualizar',compact('updateDetalleR','verF','verR','verC','verD','ver'));
        }

    }
    public function updateBDCDR(Request $request){
        $actualizarCDR = App\Competencias_Has_Detalle_Ruta::FindOrFail($request->id);
        $actualizarCDR->resultadoCompetenciaId = $request->resultadoCompetenciaId;
        $actualizarCDR->CompetenciasId = $request->CompetenciasId;
        $actualizarCDR->DetalleRutaId = $request->DetalleRutaId;
        $actualizarCDR->update();
        return redirect('Competencias_has_Ruta/lista');
    }
}
