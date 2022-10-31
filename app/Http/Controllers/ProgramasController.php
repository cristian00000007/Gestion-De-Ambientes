<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\DB;

class ProgramasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function InsertP(Request $request){
        $insertarP = new App\Programa();
        $insertarP->Progra_Nombre = $request->Progra_Nombre;
        $insertarP->Progra_Codigo = $request->Progra_Codigo;
        $insertarP->Progra_Version = $request->Progra_Version;
        $insertarP->Progra_TipoDuracion = $request->Progra_TipoDuracion;
        $insertarP->Progra_Duracion = $request->Progra_Duracion;
        $insertarP->Progra_FechaRegistro = $request->Progra_FechaRegistro;
        $insertarP->Progra_Estado ='1';
        $insertarP->TipoPrograma_id = $request->TipoPrograma_id;
        $insertarP->save();
        return redirect('programas/lista');

    }
    public function ver(){
        if($r = auth()->user()->rol == 'Administrador'){
            $k = auth()->user()->email;
            $ver = DB::table('instructors')
            ->where('instructors.Instruct_EmailAlternativo','=',$k)
            ->get();
            $verRF = app\Ruta_Formacion::all();
            $vertipo = App\Tipo_Programa::all();
            return view('programas/index',compact('vertipo','verRF','ver'));
        }

    }

    public function verl(){
        if($r = auth()->user()->rol == 'Administrador'){
            $k = auth()->user()->email;
            $ver = DB::table('instructors')
            ->where('instructors.Instruct_EmailAlternativo','=',$k)
            ->get();
            $verpr =  App\Programa::All();
            return view('programas/lista',compact('verpr','ver'));
        }

        if($r = auth()->user()->rol == 'Aprendiz'){
            return view('Estudiante.programas.index');
        }

        if($r = auth()->user()->rol == 'Instructor'){
            $k = auth()->user()->email;
            $ver = DB::table('instructors')
            ->where('instructors.Instruct_EmailAlternativo','=',$k)
            ->get();
            return view('maestros.programa.index',compact('ver'));
        }
    }
    public function resuljson(){
        $verp = App\Programa::all();
        $datos = array('data' => $verp);
        return $datos;
    }
    public function deletePro($id){
        $deletePrograma = App\Programa::FindOrFail($id);
        $deletePrograma->delete();
        return redirect('programas/lista');
    }
    public function updatePro($id){
        if($r = auth()->user()->rol == 'Administrador'){
            $k = auth()->user()->email;
            $ver = DB::table('instructors')
            ->where('instructors.Instruct_EmailAlternativo','=',$k)
            ->get();
            $vertipo = App\Tipo_Programa::all();
            $updatePrograma = App\Programa::FindOrFail($id);
            return view('programas/actualizar',compact('updatePrograma','vertipo','ver'));
        }

    }
    public function updateBDPro(Request $request){
        $actualizarPrograma = App\Programa::FindOrFail($request->id);
        $actualizarPrograma->Progra_Nombre = $request->Progra_Nombre;
        $actualizarPrograma->Progra_Codigo = $request->Progra_Codigo;
        $actualizarPrograma->Progra_Version = $request->Progra_Version;
        $actualizarPrograma->Progra_TipoDuracion = $request->Progra_TipoDuracion;
        $actualizarPrograma->Progra_Duracion = $request->Progra_Duracion;
        $actualizarPrograma->Progra_FechaRegistro = $request->Progra_FechaRegistro;
        $actualizarPrograma->Progra_Estado = '1';
        $actualizarPrograma->TipoPrograma_id = $request->TipoPrograma_id;
        $actualizarPrograma->update();
        return redirect('programas/lista');
    }

    public function VerTipos(){
        if($r = auth()->user()->rol == 'Administrador'){
            $k = auth()->user()->email;
            $ver = DB::table('instructors')
            ->where('instructors.Instruct_EmailAlternativo','=',$k)
            ->get();
            return view('Tipo_Programas.index',compact('ver'));
        }

    }

    public function VerTiposlista(){
        if($r = auth()->user()->rol == 'Administrador'){
            $k = auth()->user()->email;
            $ver = DB::table('instructors')
            ->where('instructors.Instruct_EmailAlternativo','=',$k)
            ->get();
            $verTP = app\Tipo_Programa::all();
            return view('Tipo_Programas.lista',compact('verTP','ver'));
        }

    }

    public function InsertarTipoP(Request $request){
        $insertarTP = new App\Tipo_Programa();
        $insertarTP->Tipo_Progra_Nombre = $request->Tipo_Progra_Nombre;
        $insertarTP->Tipo_Progra_Estado = '1';
        $insertarTP->save();
        return redirect('Tipos_Programas/lista');

    }


    public function resuljson2(){
        $verp = App\Tipo_Programa::all();
        $datos = array('data' => $verp);
        return $datos;
    }
    public function deleteTP($id){
        $deletePrograma = App\Tipo_Programa::FindOrFail($id);
        $deletePrograma->delete();
        return redirect('Tipos_Programas/lista');
    }
    public function updateTP($id){
        if($r = auth()->user()->rol == 'Administrador'){
            $k = auth()->user()->email;
            $ver = DB::table('instructors')
            ->where('instructors.Instruct_EmailAlternativo','=',$k)
            ->get();
            $updateTP = App\Tipo_Programa::FindOrFail($id);
            return view('Tipo_Programas.actualizar',compact('updateTP','ver'));;
        }

    }
    public function updateBDTP(Request $request){
        $actualizarTP = App\Tipo_Programa::FindOrFail($request->id);
        $actualizarTP->Tipo_Progra_Nombre = $request->Tipo_Progra_Nombre;
        $actualizarTP->Tipo_Progra_Estado = $request->Tipo_Progra_Estado;
        $actualizarTP->update();
        return redirect('Tipos_Programas/lista');
    }



}
