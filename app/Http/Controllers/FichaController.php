<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\DB;

class FichaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function indexf(){
        if($r = auth()->user()->rol == 'Administrador'){
            $k = auth()->user()->email;
            $ver = DB::table('instructors')
            ->where('instructors.Instruct_EmailAlternativo','=',$k)
            ->get();
            return view('fichas/index',compact('ver'));
        }

    }

    public function guardarficha(Request $request){
        $guardarf = new App\Ficha();
        $guardarf->Ficha_Numero = $request->Ficha_Numero;
        $guardarf->Ficha_CantidadApren = $request->Ficha_CantidadApren;
        $guardarf->Ficha_Jornada = $request->Ficha_Jornada;
        $guardarf->Ficha_FechaInicio = $request->Ficha_FechaInicio;
        $guardarf->Ficha_FechaFin = $request->Ficha_FechaFin;
        $guardarf->Ficha_Estado = '1';
        $guardarf->Programa_Id = $request->Programa_Id;
        $guardarf->RutaFormacionId = $request->RutaFormacionId;
        $guardarf->InstructorId = $request->InstructorId;
        $guardarf->save();

        return redirect('ficha/lista');
    }
    public function viewP(){
        if($r = auth()->user()->rol == 'Administrador'){
            $k = auth()->user()->email;
            $ver = DB::table('instructors')
            ->where('instructors.Instruct_EmailAlternativo','=',$k)
            ->get();
            $infoPrograma = App\Programa::All();
            $infoR = App\Ruta_Formacion::All();
            $infoI = App\Instructor::All();
            return view('fichas/index',compact('infoPrograma','infoR','infoI','ver'));
        }

    }
    public function verl(){
        if($r = auth()->user()->rol == 'Administrador'){
            $k = auth()->user()->email;
            $ver = DB::table('instructors')
            ->where('instructors.Instruct_EmailAlternativo','=',$k)
            ->get();
            $verp =  App\Ficha::All();
            return view('fichas/lista',compact('verp','ver'));
        }

        if($r = auth()->user()->rol == 'Aprendiz'){
            return view('Estudiante.fichas.index');
        }
        if($r = auth()->user()->rol == 'Instructor'){
            return view('maestros.fichas.index');
        }
    }

    public function resultjson(){
        $verf = App\Ficha::All();
        $datos = array('data' => $verf);
        return $datos;
    }

    public function delecteFi($id){
        $deleteFicha = App\Ficha::FindOrFail($id);
        $deleteFicha->delete();
        return redirect('ficha/lista');
    }
    public function updateFi($id){
        if($r = auth()->user()->rol == 'Administrador'){
            $k = auth()->user()->email;
            $ver = DB::table('instructors')
            ->where('instructors.Instruct_EmailAlternativo','=',$k)
            ->get();
            $infoPrograma = App\Programa::All();
            $infoR = App\Ruta_Formacion::All();
            $infoI = App\Instructor::All();
            $updateFicha = App\Ficha::FindOrFail($id);
            return view('fichas/actualizar',compact('updateFicha','infoPrograma','infoR','infoI','ver'));
        }

    }
    public function updateBDFi(Request $request){
        $ActualizarF = App\Ficha::FindOrFail($request->id);
        $ActualizarF->Ficha_Numero = $request->Ficha_Numero;
        $ActualizarF->Ficha_CantidadApren = $request->Ficha_CantidadApren;
        $ActualizarF->Ficha_Jornada = $request->Ficha_Jornada;
        $ActualizarF->Ficha_FechaInicio = $request->Ficha_FechaInicio;
        $ActualizarF->Ficha_FechaFin = $request->Ficha_FechaFin;
        $ActualizarF->Ficha_Estado = $request->Ficha_Estado;
        $ActualizarF->Programa_Id = $request->Programa_Id;
        $ActualizarF->RutaFormacionId = $request->RutaFormacionId;
        $ActualizarF->InstructorId = $request->InstructorId;
        $ActualizarF->update();
        return redirect('ficha/lista');
    }
}
