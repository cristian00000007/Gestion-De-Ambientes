<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\DB;
class TipoVinculacionController extends Controller
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
            return view('Tipo_Vinculacion.index',compact('ver'));
        }
    }

    public function indexL(){
        if(auth()->user()->rol == 'Administrador'){
            $k = auth()->user()->email;
            $ver = DB::table('instructors')
            ->where('instructors.Instruct_EmailAlternativo','=',$k)
            ->get();
            $verTV = App\Tipo_Vinculacion::all();
            return view('Tipo_Vinculacion.lista',compact('verTV','ver'));
        }

    }

    public function resultjson(){
        $verp = App\Tipo_Vinculacion::All();
        $datos = array('data' => $verp);
        return $datos;
    }

    public function GuardarVinvulacion(Request $request){
        $GuardarV = new App\Tipo_Vinculacion();
        $GuardarV->Tipo_Vin_Nombre=$request->Tipo_Vin_Nombre;
        $GuardarV->Tipo_Vin_CantidadHoras=$request->Tipo_Vin_CantidadHoras;
        $GuardarV->save();

        return redirect('Tipo_Vinculacion/lista');
    }

    public function deleteI($id){

        $deleteInstructor = App\Tipo_Vinculacion::FindOrFail($id);
        $deleteInstructor->delete();
        return redirect('Tipo_Vinculacion/lista');
    }

    public function updateI($id){
        if(auth()->user()->rol == 'Administrador'){
            $k = auth()->user()->email;
            $ver = DB::table('instructors')
            ->where('instructors.Instruct_EmailAlternativo','=',$k)
            ->get();
            $updateI = App\Tipo_Vinculacion::FindOrFail($id);
            return view('Tipo_Vinculacion.actualizar',compact('updateI','ver'));;
        }

    }

    public function updateIBD(Request $request){
        $updateV = App\Tipo_Vinculacion::FindOrFail($request->id);
        $updateV->Tipo_Vin_Nombre=$request->Tipo_Vin_Nombre;
        $updateV->Tipo_Vin_CantidadHoras=$request->Tipo_Vin_CantidadHoras;
        $updateV->update();

        return redirect('Tipo_Vinculacion/lista');


    }
}
