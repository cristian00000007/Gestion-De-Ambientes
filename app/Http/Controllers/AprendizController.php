<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
class AprendizController extends Controller

{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getaprendiz(){
        if(auth()->user()->rol == 'Administrador'){
            $k = auth()->user()->email;
            $ver = DB::table('instructors')
            ->where('instructors.Instruct_EmailAlternativo','=',$k)
            ->get();
            $verF = app\Ficha::all();
            return view('aprendiz.index',compact('verF','ver'));
        }

    }
    public function gAprendizL(){
        if($r = auth()->user()->rol == 'Administrador'){
            $k = auth()->user()->email;
            $ver = DB::table('instructors')
            ->where('instructors.Instruct_EmailAlternativo','=',$k)
            ->get();
            $verR = App\aprendiz::all();
            return view('aprendiz.lista', compact('verR','ver'));
        }
        if($r = auth()->user()->rol == 'Instructor'){
            return view('maestros.aprendiz.index');
        }
    }

    public function perfil(){
        if($r = auth()->user()->rol == 'Aprendiz'){
            $k = auth()->user()->name;
            $ver = DB::table('aprendizs')
            ->where('aprendizs.Aprend_Nombres', '=', $k)
            ->get();
            return view('aprendiz.perfil',compact('ver'));
        }
    }

    public function resultjson(){
        $vera = App\aprendiz::All();
        $datos = array('data' => $vera);
        return $datos;
    }

    public function saveAprendiz(Request $request){
        if(auth()->user()->rol == 'Administrador'){
            $k = auth()->user()->email;
            $ver = DB::table('instructors')
            ->where('instructors.Instruct_EmailAlternativo','=',$k)
            ->get();
            $ruta = Storage::disk('public')->put('Instructor',$request->file('Aprend_Foto'));
            $unavariable = $ruta;

            $saveaprendiz = new App\aprendiz();
            $saveaprendiz->Aprend_Nombres = $request->Aprend_Nombres;
            $saveaprendiz->Aprend_Apellidos = $request->Aprend_Apellidos;
            $saveaprendiz->Aprend_Documento = $request->Aprend_Documento;
            $saveaprendiz->Aprend_Celular = $request->Aprend_Celular;
            $saveaprendiz->Aprend_Email = $request->Aprend_Email;
            $saveaprendiz->Aprend_Foto = $unavariable;
            $saveaprendiz->Aprend_Estado = '1';
            $saveaprendiz->FichaId = $request->FichaId;
            $saveaprendiz->save();

            if($saveaprendiz->save() == true){
                $guardaruser = new App\User();
                $guardaruser->name = $request->Aprend_Nombres;
                $guardaruser->email = $request->Aprend_Email;
                $guardaruser->rol = $request->rol;
                $guardaruser->password = Hash::make($request->pass);
                $guardaruser->save();
                return view('aprendiz.lista',compact('ver'));

            }
        }

    }

    public function delecteA($id){
        $deleteAprendiz = App\aprendiz::FindOrFail($id);
        $deleteAprendiz->delete();
        return redirect('aprendiz/lista');
    }
    public function updateA($id){
        if($r = auth()->user()->rol == 'Administrador'){
            $k = auth()->user()->email;
            $ver = DB::table('instructors')
            ->where('instructors.Instruct_EmailAlternativo','=',$k)
            ->get();
            $verF = app\Ficha::all();
            $updateAprendiz = App\aprendiz::FindOrFail($id);
            return view('aprendiz/actualizar',compact('updateAprendiz','verF','ver'));
        }

    }


    public function updateBDA(Request $request){
        $atualizarUser = App\User::FindOrFail($request->id2);
        $atualizarUser->password = Hash::make($request->pass);
        $atualizarUser->update();
        return view('home');
        // if (empty($request->Aprend_Foto)){
        //     $actualizarAprendiz = App\aprendiz::FindOrFail($request->id);
        //     $actualizarAprendiz->Aprend_Nombres = $request->Aprend_Nombres;
        //     $actualizarAprendiz->Aprend_Apellidos = $request->Aprend_Apellidos;
        //     $actualizarAprendiz->Aprend_Documento = $request->Aprend_Documento;
        //     $actualizarAprendiz->Aprend_Celular = $request->Aprend_Celular;
        //     $actualizarAprendiz->Aprend_Email = $request->Aprend_Email;
        //     $actualizarAprendiz->Aprend_Estado = $request->Aprend_Estado;
        //     $actualizarAprendiz->FichaId = $request->FichaId;
        //     $actualizarAprendiz->update();

        //     return view('aprendiz.lista');
        // }
        // else{
        //     $ruta = Storage::disk('public')->put('Instructor',$request->file('Aprend_Foto'));
        //     $unavariable = $ruta;

        //     $actualizarAprendiz = App\aprendiz::FindOrFail($request->id);
        //     $actualizarAprendiz->Aprend_Nombres = $request->Aprend_Nombres;
        //     $actualizarAprendiz->Aprend_Apellidos = $request->Aprend_Apellidos;
        //     $actualizarAprendiz->Aprend_Documento = $request->Aprend_Documento;
        //     $actualizarAprendiz->Aprend_Celular = $request->Aprend_Celular;
        //     $actualizarAprendiz->Aprend_Email = $request->Aprend_Email;
        //     $actualizarAprendiz->Aprend_Foto = $unavariable;
        //     $actualizarAprendiz->Aprend_Estado ='1';
        //     $actualizarAprendiz->FichaId = $request->FichaId;
        //     $actualizarAprendiz->update();

        //         return view('aprendiz.lista');



        // }
    }

}
