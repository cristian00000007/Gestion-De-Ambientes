<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Ambientes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class AmbienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        if(auth()->user()->rol == 'Administrador'){
            $k = auth()->user()->email;
            $ver = DB::table('instructors')
            ->where('instructors.Instruct_EmailAlternativo','=',$k)
            ->get();
            $verCagAmbiente = app\Categoria_ambiente::all();
            return view('Ambientes.index', compact('verCagAmbiente','ver'));
        }

    }

    public function indexl(Request $request){
        if($r = auth()->user()->rol == 'Administrador'){
            $verCa = app\Categoria_ambiente::all();
            $verA= app\Ambientes::all();

            $k = auth()->user()->email;
            $ver = DB::table('instructors')
            ->where('instructors.Instruct_EmailAlternativo','=',$k)
            ->get();
            return view('Ambientes.lista',compact('verCa','verA','ver'));
        }

        if($r = auth()->user()->rol == 'Aprendiz'){
            $email = auth()->user()->email;
            $ver = DB::table('aprendizs')
            ->where('aprendizs.Aprend_Email','=', $email)
            ->get();
            return view('Estudiante.ambientes.index',compact('ver'));
        }
        if($r = auth()->user()->rol == 'Instructor'){
            $k = auth()->user()->email;
            $ver = DB::table('instructors')
            ->where('instructors.Instruct_EmailAlternativo','=',$k)
            ->get();
            $verAm = App\Ambientes::all();
            $verProg = App\Programacion::all();
            $tiempo = date('H:i:s');
            if ($tiempo > 12 && $tiempo < 18) {
                $tiempo = 'Tarde';
            }
            if ($tiempo > 18 && $tiempo < 24) {
                $tiempo = 'Noche';
            }
            if ($tiempo > 0 && $tiempo < 12) {
                $tiempo = 'Mañana';
            }

            // }
            return view('maestros.ambientes.index',compact('ver','verAm','tiempo','verProg'));
        }
    }

    public function GuardarAmbientes(Request $request){
        if($r = auth()->user()->rol == 'Administrador'){
            $k = auth()->user()->email;
            $ver = DB::table('instructors')
            ->where('instructors.Instruct_EmailAlternativo','=',$k)
            ->get();
            $ruta = Storage::disk('public')->put('Instructor',$request->file('Ambien_Foto'));
            $unavariable = $ruta;

            $GuardarA = new App\Ambientes();
            $GuardarA->Ambien_Nombres = $request->Ambien_Nombres;
            $GuardarA->Ambien_Capacidad = $request->Ambien_Capacidad;
            $GuardarA->Ambien_Foto = $unavariable;
            $GuardarA->Ambien_Observacion = $request->Ambien_Observacion;
            $GuardarA->Ambien_Estado ='1';
            $GuardarA->CategoriaAmbienteId = $request->CategoriaAmbienteId;
            $GuardarA->save();

            return view('ambientes/lista',compact('ver'));
        }

    }

    public function verProgramas(Request $request){
        $va = $request->id;
        if($r = auth()->user()->rol == 'Instructor'){

            $k = auth()->user()->email;
            $ver = DB::table('instructors')
            ->where('instructors.Instruct_EmailAlternativo','=',$k)
            ->get();
            $ge = DB::table('ambientes')
            ->where('ambientes.id','=', $va)
            ->get();
            return view('Ambientes.programas',compact('ver','ge'));
        }
    }

    public function resultjson(){
        $verp = App\Ambientes::All();
        $datos = array('data' => $verp);
        return $datos;
    }

    public function delecteAm($id){
        $deleteAmbien = App\Ambientes::FindOrFail($id);
        $deleteAmbien->delete();
        return view('ambientes/lista');
    }
    public function updateAm($id){
        if(auth()->user()->rol == 'Administrador'){
            $k = auth()->user()->email;
            $ver = DB::table('instructors')
            ->where('instructors.Instruct_EmailAlternativo','=',$k)
            ->get();
            $infoCa = App\Categoria_ambiente::All();
            $updateAmbien = App\Ambientes::FindOrFail($id);
            return view('ambientes/actualizar',compact('infoCa','updateAmbien','ver'));
        }


    }
    public function updateBDAm(Request $request){
        if(empty($request->Ambien_Foto)){
            $actualizarA = App\Ambientes::FindOrFail($request->id);
            $actualizarA->Ambien_Nombres = $request->Ambien_Nombres;
            $actualizarA->Ambien_Capacidad = $request->Ambien_Capacidad;
            $actualizarA->Ambien_Observacion = $request->Ambien_Observacion;
            $actualizarA->Ambien_Estado = $request->Ambien_Estado;
            $actualizarA->CategoriaAmbienteId = $request->CategoriaAmbienteId;
            $actualizarA->update();
            return view('Ambientes.lista');

        }else{
            $ruta = Storage::disk('public')->put('Instructor',$request->file('Ambien_Foto'));
            $unavariable = $ruta;

            $actualizarA = App\Ambientes::FindOrFail($request->id);
            $actualizarA->Ambien_Nombres = $request->Ambien_Nombres;
            $actualizarA->Ambien_Capacidad = $request->Ambien_Capacidad;
            $actualizarA->Ambien_Foto = $unavariable;
            $actualizarA->Ambien_Observacion = $request->Ambien_Observacion;
            $actualizarA->Ambien_Estado = $request->Ambien_Estado;
            $actualizarA->CategoriaAmbienteId = $request->CategoriaAmbienteId;
            $actualizarA->update();
        return view('Ambientes.lista');
        }

    }
}
