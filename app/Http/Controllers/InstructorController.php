<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class InstructorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function verp(){
        if(auth()->user()->rol == 'Instructor'){
            $k = auth()->user()->email;
            $ver = DB::table('instructors')
            ->where('instructors.Instruct_EmailAlternativo','=',$k)
            ->get();
            return view('maestros.perfil',compact('ver'));
        }
    }

    public function verI(){
        if(auth()->user()->rol == 'Administrador'){
            $k = auth()->user()->email;
            $ver = DB::table('instructors')
            ->where('instructors.Instruct_EmailAlternativo','=',$k)
            ->get();
            $verP = App\Tipo_Vinculacion::all();
            $verA = App\Area_Tematica::all();
            return view('instructor.index',compact('verP','verA','ver'));
        }

    }
    public function verL(){
        if(auth()->user()->rol == 'Administrador'){
            $k = auth()->user()->email;
            $ver = DB::table('instructors')
            ->where('instructors.Instruct_EmailAlternativo','=',$k)
            ->get();
            $verl = App\Instructor::all();
            return view('instructor.lista',compact('verl','ver'));
        }

    }

    public function resultjson(){
        $verf = App\Instructor::All();
        $datos = array('data' => $verf);
        return $datos;
    }

    public function GuardarI(Request $request){
        if(auth()->user()->rol == 'Administrador'){
            $k = auth()->user()->email;
            $ver = DB::table('instructors')
            ->where('instructors.Instruct_EmailAlternativo','=',$k)
            ->get();
            $ruta = Storage::disk('public')->put('Instructor',$request->file('Instruct_Foto'));
            $unavariable = $ruta;

            $guardarinstructor = new App\Instructor();
            $guardarinstructor->Instruct_Nombres = $request->Instruct_Nombres;
            $guardarinstructor->Instruct_Celular = $request->Instruct_Celular;
            $guardarinstructor->Instruc_Cedula = $request->	Instruc_Cedula;
            $guardarinstructor->Instruct_Apellidos = $request->Instruct_Apellidos;
            $guardarinstructor->Instruct_EmailInstitucional = $request->Instruct_EmailInstitucional;
            $guardarinstructor->Instruct_EmailAlternativo = $request->Instruct_EmailAlternativo;
            $guardarinstructor->Instruct_Estado = '1';
            $guardarinstructor->AreaTematicaId = $request->AreaTematicaId;
            $guardarinstructor->TipoVinculacionId = $request->TipoVinculacionId;
            $guardarinstructor->Instruct_Foto = $unavariable;
            $guardarinstructor->save();

            if($guardarinstructor->save() == true){
                $guardaruser = new App\User();
                $guardaruser->name = $request->Instruct_Nombres;
                $guardaruser->email = $request->Instruct_EmailInstitucional;
                $guardaruser->rol = $request->rol;
                $guardaruser->password = Hash::make($request->pass);
                $guardaruser->save();

                return view('instructor.lista',compact('ver'));
            }
        }



    }

    public function deleteI($id){

        $deleteInstructor = App\Instructor::FindOrFail($id);
        $deleteInstructor->delete();
        return redirect('instructor/lista');
    }

    public function updateI($id){
        if(auth()->user()->rol == 'Administrador'){
            $k = auth()->user()->email;
            $ver = DB::table('instructors')
            ->where('instructors.Instruct_EmailAlternativo','=',$k)
            ->get();
            $verP = App\Tipo_Vinculacion::all();
            $verA = App\Area_Tematica::all();
            $updateI = App\Instructor::FindOrFail($id);
            return view('instructor.actualizar',compact('updateI','verP','verA','ver'));
        }

    }

    public function updateIBD(Request $request){
        if(auth()->user()->rol == 'Instructor'){
            $atualizarUser = App\User::FindOrFail($request->id2);
            $atualizarUser->password = Hash::make($request->pass);
            $atualizarUser->update();
            return view('home');
        }
        if(auth()->user()->rol == 'Administrador'){
            if (empty($request->fotoI)){
                $updateInstructor = App\Instructor::FindOrFail($request->id);
                $updateInstructor->Instruct_Nombres = $request->Instruct_Nombres;
                $updateInstructor->Instruct_Celular = $request->Instruct_Celular;
                $updateInstructor->Instruct_Apellidos = $request->Instruct_Apellidos;
                $updateInstructor->Instruct_EmailInstitucional = $request->Instruct_EmailInstitucional;
                $updateInstructor->Instruct_EmailAlternativo = $request->Instruct_EmailAlternativo;
                $updateInstructor->Instruct_Estado = $request->Instruct_Estado;
                $updateInstructor->AreaTematicaId = $request->AreaTematicaId;
                $updateInstructor->TipoVinculacionId = $request->TipoVinculacionId;
                $updateInstructor->update();

                return redirect('instructor/lista');
                }
                else{
                    $ruta = Storage::disk('public')->put('Instructor',$request->file('Instruct_Foto'));
                $unavariable = $ruta;
                $updateInstructor = App\Instructor::FindOrFail($request->id);
                $updateInstructor->Instruct_Nombres = $request->Instruct_Nombres;
                $updateInstructor->Instruct_Celular = $request->Instruct_Celular;
                $updateInstructor->Instruct_Apellidos = $request->Instruct_Apellidos;
                $updateInstructor->Instruct_EmailInstitucional = $request->Instruct_EmailInstitucional;
                $updateInstructor->Instruct_EmailAlternativo = $request->Instruct_EmailAlternativo;
                $updateInstructor->Instruct_Estado = '1';
                $updateInstructor->AreaTematicaId = $request->AreaTematicaId;
                $updateInstructor->TipoVinculacionId = $request->TipoVinculacionId;
                $updateInstructor->Instruct_Foto = $unavariable;
                $updateInstructor->update();

                return redirect('instructor/lista');

                }
        }


    }
}
