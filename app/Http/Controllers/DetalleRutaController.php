<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\DB;

class DetalleRutaController extends Controller
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
            $verRF = App\Ruta_Formacion::all();
            $ver2 = App\Resultado_competencia::all();
            $qu = App\Programas::all();
            return view('Detalle_Ruta.index',compact('ver','verd','qu','ver2'));
        }

    }


    public function indexL(){
        if($r = auth()->user()->rol == 'Administrador'){
            $k = auth()->user()->email;
            $ver = DB::table('instructors')
            ->where('instructors.Instruct_EmailAlternativo','=',$k)
            ->get();
            $verl = App\Detalle_ruta::all();
            return view('Detalle_Ruta.lista', compact('verl','ver'));
        }

    }

    public function resultjson(){
        $verr = App\Detalle_ruta::All();
        $datos = array('data' => $verr);
        return $datos;
    }

    public function GuardarDetalleR(Request $request){
        if($r = auth()->user()->rol == 'Administrador'){
            $k = auth()->user()->email;
            $ver = DB::table('instructors')
            ->where('instructors.Instruct_EmailAlternativo','=',$k)
            ->get();
            $guardarD = new App\Detalle_ruta();
            $guardarD->Detalle_Ruta_Horas = $request->Detalle_Ruta_Horas;
            $guardarD->Detalle_Ruta_TemaPrincipal = $request->Detalle_Ruta_TemaPrincipal;
            $guardarD->Detalle_Ruta_Estado = '1';
            $guardarD->RutaFormacionId = $request->RutaId;
            $guardarD->Detalle_Ruta_Trimestre = $request->Detalle_Ruta_Trimestre;
            $guardarD->save();
            $jd=$request->RutaFormacionId;
            $idr=$guardarD->id;

            if($guardarD->save() == true){
                for($i=0;$i<count($jd);$i++){
                    $guardarD2= new App\Competencias_Has_Detalle_Ruta();
                    $guardarD2->resultadoCompetenciaId = $jd[$i];
                    $guardarD2->DetalleRutaId = $idr;
                    $guardarD2->save();
                }
            }
            return view('Detalle_Ruta.lista',compact('ver'));
        }

    }

    public function deleteDR($id){
        $deleteDetalleR = App\Detalle_ruta::FindOrFail($id);
        $deleteDetalleR->delete();
        return redirect('Detalle_Ruta/lista');
    }
    public function updateDR($id){
        if($r = auth()->user()->rol == 'Administrador'){
            $k = auth()->user()->email;
            $ver = DB::table('instructors')
            ->where('instructors.Instruct_EmailAlternativo','=',$k)
            ->get();
            $verF = App\Ruta_Formacion::all();
            $updateDetalleR = App\Detalle_ruta::FindOrFail($id);
            return view('Detalle_Ruta.actualizar',compact('updateDetalleR','verF','ver'));
        }

    }
    public function updateBDDR(Request $request){
        $actualizarDR = App\Detalle_ruta::FindOrFail($request->id);
        $actualizarDR->Detalle_Ruta_Horas = $request->Detalle_Ruta_Horas;
        $actualizarDR->Detalle_Ruta_TemaPrincipal = $request->Detalle_Ruta_TemaPrincipal;
        $actualizarDR->Detalle_Ruta_Estado = $request->Detalle_Ruta_Estado;
        $actualizarDR->RutaFormacionId = $request->RutaFormacionId;
        $actualizarDR->Detalle_Ruta_Trimestre = $request->Detalle_Ruta_Trimestre;
        $actualizarDR->update();
        return redirect('Detalle_Ruta/lista');
    }
}
