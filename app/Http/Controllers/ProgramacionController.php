<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\DB;

class ProgramacionController extends Controller
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
            $verAm = app\Ambientes::all();
            $verF = app\Ficha::all();
            $verI = app\Instructor::all();
            return view('Programacion.index',compact('verAm','verF','verI','ver'));
        }

    }

    public function indexl(){
        if($r = auth()->user()->rol == 'Administrador'){
            $k = auth()->user()->email;
            $ver = DB::table('instructors')
            ->where('instructors.Instruct_EmailAlternativo','=',$k)
            ->get();
            $verPcion = app\Programacion::all();
            return view('Programacion.lista',compact('verPcion','ver'));
        }

    }

    public function GuardarPro(Request $request){

        if($r = auth()->user()->rol == 'Administrador'){
            $k = auth()->user()->email;
            $ver = DB::table('instructors')
            ->where('instructors.Instruct_EmailAlternativo','=',$k)
            ->get();
            $GuardarP = new App\Programacion();
            $GuardarP->Program_Fecha = $request->Program_Fecha;
            $GuardarP->Program_Trimestre = $request->Program_Trimestre;
            $GuardarP->Program_Franja = $request->Program_Franja;
            $GuardarP->ambientesIdAmbientes = $request->ambientesIdAmbientes;
            $GuardarP->FichaId = $request->FichaId;
            $GuardarP->InstructorId = $request->InstructorId;
            $GuardarP->save();

            return view('programacion.lista',compact('ver'));
        }

    }

    public function resultjson(){
        $verf = App\Programacion::All();
        $datos = array('data' => $verf);
        return $datos;
    }

    public function delectePro($id){
        $deleteFicha = App\Programacion::FindOrFail($id);
        $deleteFicha->delete();
        return redirect('programacion/lista');
    }
    public function updatePro($id){
        if($r = auth()->user()->rol == 'Administrador'){
            $k = auth()->user()->email;
            $ver = DB::table('instructors')
            ->where('instructors.Instruct_EmailAlternativo','=',$k)
            ->get();
            $verAm = app\Ambientes::all();
            $verF = app\Ficha::all();
            $verI = app\Instructor::all();
            $updatePro = App\Programacion::FindOrFail($id);
            return view('programacion/actualizar',compact('updatePro','verAm','verF','verI','ver'));
        }

    }
    public function updateBDPro(Request $request){
        $ActualizarPro = App\Programacion::FindOrFail($request->id);
        $ActualizarPro->Program_Fecha = $request->Program_Fecha;
        $ActualizarPro->Program_Trimestre = $request->Program_Trimestre;
        $ActualizarPro->Program_Franja = $request->Program_Franja;
        $ActualizarPro->ambientesIdAmbientes = $request->ambientesIdAmbientes;
        $ActualizarPro->FichaId = $request->FichaId;
        $ActualizarPro->InstructorId = $request->InstructorId;
        $ActualizarPro->update();
        return redirect('programacion/lista');
    }
}
