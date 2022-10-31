<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
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
            return view('categorias.index',compact('ver'));
        }

    }

    public function indexl(){
        if($r = auth()->user()->rol == 'Administrador'){
            $k = auth()->user()->email;
            $ver = DB::table('instructors')
            ->where('instructors.Instruct_EmailAlternativo','=',$k)
            ->get();
            $verc = app\Categoria_ambiente::all();
            return view('categorias.lista',compact('verc','ver'));
        }

    }

    public function resultjson(){
        $vera = App\Categoria_ambiente::All();
        $datos = array('data' => $vera);
        return $datos;
    }

    public function guardar(Request $request){
        if($r = auth()->user()->rol == 'Administrador'){
            $k = auth()->user()->email;
            $ver = DB::table('instructors')
            ->where('instructors.Instruct_EmailAlternativo','=',$k)
            ->get();
            $guardaracategoria = new App\Categoria_ambiente();
            $guardaracategoria->CategAmbien_Nombres = $request->CategAmbien_Nombres;
            $guardaracategoria->CategAmbien_Estado ='1';
            $guardaracategoria->save();

            return view('categorias.lista',compact('ver'));
        }

    }

    public function delecteA($id){
        $deleteAprendiz = App\Categoria_ambiente::FindOrFail($id);
        $deleteAprendiz->delete();
        return redirect('categorias/lista');
    }
    public function updateA($id){
        if($r = auth()->user()->rol == 'Administrador'){
            $k = auth()->user()->email;
            $ver = DB::table('instructors')
            ->where('instructors.Instruct_EmailAlternativo','=',$k)
            ->get();
            $updateCa = App\Categoria_ambiente::FindOrFail($id);
            return view('categorias/actualizar',compact('updateCa','ver'));
        }

    }
    public function updateBDA(Request $request){
        $ActualizarC =  App\Categoria_ambiente::FindOrFail($request->id);
        $ActualizarC->CategAmbien_Nombres = $request->CategAmbien_Nombres;
        $ActualizarC->CategAmbien_Estado = $request->CategAmbien_Estado;
        $ActualizarC->update();
        return redirect('categorias/lista');
    }
}
