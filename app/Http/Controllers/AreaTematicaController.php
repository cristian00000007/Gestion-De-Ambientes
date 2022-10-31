<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\DB;

class AreaTematicaController extends Controller
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
            return view('Area_Tematica.index',compact('ver'));
        }

    }

    public function verL(){
        if($r = auth()->user()->rol == 'Administrador'){
            $k = auth()->user()->email;
            $ver = DB::table('instructors')
            ->where('instructors.Instruct_EmailAlternativo','=',$k)
            ->get();
            $verl = App\Area_Tematica::all();
            return view('Area_Tematica.lista',compact('verl','ver'));
        }

    }

    public function resultjson(){
        $verf = App\Area_Tematica::All();
        $datos = array('data' => $verf);
        return $datos;
    }

    public function GuardarArea(Request $request){
        $guardarAreaT = new App\Area_Tematica();
        $guardarAreaT->Area_Tem_Nombre = $request->Area_Tem_Nombre;
        $guardarAreaT->Area_Tem_Estado ='1';
        $guardarAreaT->save();

        return redirect('Area_Tematica/lista');
    }

    public function deleteI($id){

        $deleteInstructor = App\Area_Tematica::FindOrFail($id);
        $deleteInstructor->delete();
        return redirect('Area_Tematica/lista');
    }

    public function updatePro($id){
        if($r = auth()->user()->rol == 'Administrador'){
            $k = auth()->user()->email;
            $ver = DB::table('instructors')
            ->where('instructors.Instruct_EmailAlternativo','=',$k)
            ->get();
            $updatePro = App\Area_Tematica::FindOrFail($id);
            return view('Area_Tematica/actualizar',compact('updatePro','ver'));
        }

    }

    public function updateIBD(Request $request){
        $updateAT = App\Area_Tematica::FindOrFail($request->id);
        $updateAT->Area_Tem_Nombre = $request->Area_Tem_Nombre;
        $updateAT->Area_Tem_Estado = $request->Area_Tem_Estado;
        $updateAT->update();

        return redirect('Area_Tematica/lista');
    }
}
