<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\DB;

class CompetenciasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request){

        $instanciacompetencia = new App\Competencias();
        $instanciacompetencia->Compet_Nombre = $request->Compet_Nombre;
        $instanciacompetencia->Compet_Horas = $request->Compet_Horas;
        $instanciacompetencia->Compet_ConociProceso = $request->Compet_ConociProceso;
        $instanciacompetencia->Compet_ConociSaber = $request->Compet_ConociSaber;
        $instanciacompetencia->Compet_Criterios = $request->Compet_Criterios;
        $instanciacompetencia->Compet_Estado = '1';
        $instanciacompetencia->programa_id = $request->programa_id;
        $instanciacompetencia->save();

        return redirect('competencias/lista');




    }
    public function Verc()
    {

        if($r = auth()->user()->rol == 'Administrador'){
            $k = auth()->user()->email;
            $ver = DB::table('instructors')
            ->where('instructors.Instruct_EmailAlternativo','=',$k)
            ->get();
            $infoPrograma = App\Programa::All();
            return view('competencias/index',compact('infoPrograma','ver'));
        }


    }
    public function verl(){
        if($r = auth()->user()->rol == 'Aprendiz'){
            return view('Estudiante.competencias.index');
        }

        if($r = auth()->user()->rol == 'Administrador'){
            $k = auth()->user()->email;
            $ver = DB::table('instructors')
            ->where('instructors.Instruct_EmailAlternativo','=',$k)
            ->get();
            $verc =  App\Competencias::All();
            return view('competencias.lista',compact('verc','ver'));
        }

        if($r = auth()->user()->rol == 'Instructor'){
            return view('maestros.competencias.index');
        }



    }

    public function resultjson(){
        $verp = App\Competencias::All();
        $datos = array('data' => $verp);
        return $datos;
    }

    public function delecteCo($id){
        $deleteCompetencia = App\Competencias::FindOrFail($id);
        $deleteCompetencia->delete();
        return redirect('competencias/lista');
    }
    public function updateCo($id){
        if($r = auth()->user()->rol == 'Administrador'){
            $k = auth()->user()->email;
            $ver = DB::table('instructors')
            ->where('instructors.Instruct_EmailAlternativo','=',$k)
            ->get();
            $infoPrograma = App\Programa::All();
            $updateCompetencia = App\Competencias::FindOrFail($id);
            return view('competencias/actualizar',compact('updateCompetencia','infoPrograma','ver'));
        }

    }
    public function updateBDCo(Request $request){
        $actualizarCompetencias = App\Competencias::FindOrFail($request->id);
        $actualizarCompetencias->Compet_Nombre = $request->Compet_Nombre;
        $actualizarCompetencias->Compet_Horas = $request->Compet_Horas;
        $actualizarCompetencias->Compet_ConociProceso = $request->Compet_ConociProceso;
        $actualizarCompetencias->Compet_ConociSaber = $request->Compet_ConociSaber;
        $actualizarCompetencias->Compet_Criterios = $request->Compet_Criterios;
        $actualizarCompetencias->Compet_Estado = $request->Compet_Estado;
        $actualizarCompetencias->programa_id = $request->programa_id;
        $actualizarCompetencias->update();
        return redirect('competencias/lista');
    }







}
