<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->rol == 'Aprendiz'){
            $email = auth()->user()->email;
            $ver = DB::table('aprendizs')
            ->where('aprendizs.Aprend_Email','=', $email)
            ->get();

            foreach ($ver as $info) {
                $lk= $info->FichaId;
            }

            $ver2 = DB::table('fichas')
            ->where('fichas.id', '=', $lk)
            ->get();


            foreach ($ver2 as $info) {
                $lf= $info->Programa_Id;
            }

            $ver3 = DB::table('programas')
            ->where('programas.id','=',$lf)
            ->get();

            return view('home',compact('ver','ver2','ver3'));

        }

        if(auth()->user()->rol == 'Instructor'){
            $k = auth()->user()->email;
            $ver = DB::table('instructors')
            ->where('instructors.Instruct_EmailAlternativo','=',$k)
            ->get();

            foreach($ver as $info){
                $lg = $info->TipoVinculacionId;
            }
            $ver2 = DB::table('tipo__vinculacions')
            ->where('tipo__vinculacions.id','=',$lg)
            ->get();


            return view('home',compact('ver','ver2'));
        }

        if(auth()->user()->rol == 'Administrador'){
            $k = auth()->user()->email;
            $ver = DB::table('instructors')
            ->where('instructors.Instruct_EmailAlternativo','=',$k)
            ->get();
            return view('home',compact('ver'));
        }


    }
}
