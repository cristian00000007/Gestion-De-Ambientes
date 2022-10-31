<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Competencias;
use App\Programas;
use Illuminate\Support\Facades\DB;

class RutaFormacionController extends Controller
{

    public function index(){
        if($r = auth()->user()->rol == 'Administrador'){
            $k = auth()->user()->email;
            $ver = DB::table('instructors')
            ->where('instructors.Instruct_EmailAlternativo','=',$k)
            ->get();
            $qu = App\Programas::all();
            return view('RutaFormacion.index',compact('qu','ver'));
        }

    }

    public function indexL(){
        if($r = auth()->user()->rol == 'Administrador'){
            $k = auth()->user()->email;
            $ver = DB::table('instructors')
            ->where('instructors.Instruct_EmailAlternativo','=',$k)
            ->get();
            $verl = App\Ruta_Formacion::all();
            return view('RutaFormacion.lista', compact('verl','ver'));
        }

    }
    public function detalleR($id , $id2){
        if($r = auth()->user()->rol == 'Administrador'){
            $k = auth()->user()->email;
            $verl = DB::table('instructors')
            ->where('instructors.Instruct_EmailAlternativo','=',$k)
            ->get();

            $verr = DB::table('competencias')
            ->where('competencias.programa_id', '=', $id2)
            ->get();

            $pro = DB::table('ruta__formacions')
            ->join('programas', function($join){
                $join->on('ruta__formacions.Programa_id','=','programas.id');
            })
            ->where('programas.id','=',$id2)
            ->get();

            $ver = App\Ruta_Formacion::FindOrFail($id);
            $verRC = app\Resultado_competencia::all();
            $verdr = App\Detalle_ruta::all();
            $qu = App\Programas::all();
            return view('Detalle_Ruta.index',compact('ver','verr','verRC','verdr','pro','qu','verl'));
        }
    }

    public function listr($c){
        $resul = DB::table('resultado_competencias')
        ->where('resultado_competencias.competencias_id','=',$c)
        ->get();

        return $resul;
    }

    public function resultjson(){
        $verr = App\Ruta_Formacion::All();
        $datos = array('data' => $verr);
        return $datos;
    }

    public function guardarFormacion(Request $request){
        if($r = auth()->user()->rol == 'Administrador'){
            $k = auth()->user()->email;
            $ver = DB::table('instructors')
            ->where('instructors.Instruct_EmailAlternativo','=',$k)
            ->get();
            $guardarFormacion = new App\Ruta_Formacion();
            $guardarFormacion->Ruta_Nombre = $request->Ruta_Nombre;
            $guardarFormacion->Ruta_Estado = '1';
            $guardarFormacion->Programa_id = $request->Programa_id;
            $guardarFormacion->save();

            return view('RutaFormacion.lista',compact('ver'));
        }

    }
    public function deleteRF($id){
        $deleteRutaf = App\Ruta_Formacion::FindOrFail($id);
        $deleteRutaf->delete();
        return redirect('RutaFormacion/lista');
    }
    public function updateRF($id){
        if($r = auth()->user()->rol == 'Administrador'){
            $k = auth()->user()->email;
            $ver = DB::table('instructors')
            ->where('instructors.Instruct_EmailAlternativo','=',$k)
            ->get();
            $updateRutaf = App\Ruta_Formacion::FindOrFail($id);
            return view('RutaFormacion.actualizar',compact('updateRutaf','ver'));
        }

    }
    public function updateBDRF(Request $request){
        $actualizarRf = App\Ruta_Formacion::FindOrFail($request->id);
        $actualizarRf->Ruta_Nombre = $request->Ruta_Nombre;
        $actualizarRf->Ruta_Estado = $request->Ruta_Estado;
        $actualizarRf->update();
        return redirect('RutaFormacion/lista');
    }

}
