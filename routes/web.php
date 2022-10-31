<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Auth\VerificationController;

use App\Competencias;
use App\Http\Controllers\FichaController;
use App\Http\Controllers\ProgramasController;

Route::get('/', function () {
    if(!auth()->check()){
        return view('auth.login');
    }
    if(auth()->check()){
        return view('home');
    }

})->name('login.index');

#region Area
Route::get('Area_Tematica/update/{id}','AreaTematicaController@updatePro')->name('actualizarAT');
Route::get('Area_Tematica','AreaTematicaController@index')->name('IndexArea');
Route::post('Area_Tematica/index','AreaTematicaController@GuardarArea')->name('GuardarAreaT');
Route::get('Area_Tematica/lista','AreaTematicaController@verL')->name('ListaAT');
Route::get('Area_Tematica/listjsonp','AreaTematicaController@resultjson')->name('listATj');
Route::get('Area_Tematica/delete/{id}','AreaTematicaController@deleteI')->name('EliminarAT');
Route::post('Area_Tematica/update','AreaTematicaController@updateIBD')->name('actualizarBDAT');
#endregion

#region Tipo Vinculacion
Route::get('Tipo_Vinculacion/listjsonp','TipoVinculacionController@resultjson')->name('listTVj');
Route::get('Tipo_Vinculacion/index','TipoVinculacionController@index')->name('indexV');
Route::post('Tipo_Vinculacion/index','TipoVinculacionController@GuardarVinvulacion')->name('GuardarVin');
Route::get('Tipo_Vinculacion/lista','TipoVinculacionController@indexL')->name('ListaTV');
Route::get('Tipo_Vinculacion/delete/{id}','TipoVinculacionController@deleteI')->name('EliminarTV');
Route::get('Tipo_Vinculacion/update/{id}','TipoVinculacionController@updateI')->name('actualizarTV');
Route::post('Tipo_Vinculacion/update','TipoVinculacionController@updateIBD')->name('actualizarBDTV');
#endregion

#region Ruta Formacion
Route::get('RutaFormacion/index','RutaFormacionController@index')->name('indexFormacion');
Route::post('RutaFormacion/index','RutaFormacionController@guardarFormacion')->name('guardarFormacion');
Route::get('RutaFormacion/lista','RutaFormacionController@indexL')->name('ListaRF');
Route::get('RutaFormacion/listjsonp','RutaFormacionController@resultjson')->name('listRFj');
Route::get('RutaFormacion/delete/{id}','RutaFormacionController@deleteRF')->name('EliminarRF');
Route::get('RutaFormacion/update/{id}','RutaFormacionController@updateRF')->name('actualizarRF');
Route::post('RutaFormacion/update','RutaFormacionController@updateBDRF')->name('actualizarBDRF');
Route::get('Detalle_Ruta/detalle/{id}/{id2}','RutaFormacionController@detalleR')->name('DetalleDeRuta');
#endregion

#region Categorias
Route::get('categorias/index','CategoriaController@index')->name('indexCategoria');
Route::post('categorias/index','CategoriaController@guardar')->name('guardadCategoria');
Route::get('categorias/lista','CategoriaController@indexl')->name('ListCAm');
Route::get('categorias/listjsonp','CategoriaController@resultjson')->name('listCa');
Route::get('categorias/delete/{id}','CategoriaController@delecteA')->name('eliminarCa');
Route::get('categorias/update/{id}','CategoriaController@updateA')->name('ActualizarCa');
Route::post('categorias/update','CategoriaController@updateBDA')->name('actualizarBDCa');
#endregion

#region Ambientes
Route::get('Ambientes/index','AmbienteController@index')->name('IndexAmbiente');
Route::post('Ambientes/index','AmbienteController@GuardarAmbientes')->name('GuardarAmbiente');
Route::get('Ambientes/lista','AmbienteController@indexl')->name('ListAm');
Route::get('Ambientes/listjsonp','AmbienteController@resultjson')->name('listAmJ');
Route::get('Ambientes/delete/{id}','AmbienteController@delecteAm')->name('eliminarAm');
Route::get('Ambientes/update/{id}','AmbienteController@updateAm')->name('ActualizarAm');
Route::post('Ambientes/update','AmbienteController@updateBDAm')->name('actualizarBDAm');
#endregion

#region Detalle Ruta
Route::get('Detalle_Ruta','DetalleRutaController@index')->name('indexDR');
Route::post('Detalle_Ruta/index','DetalleRutaController@GuardarDetalleR')->name('GuardarDR');
Route::get('Detalle_Ruta/lista','DetalleRutaController@indexL')->name('ListDR');
Route::get('Detalle_Ruta/listjsonp','DetalleRutaController@resultjson')->name('listDRJ');
Route::get('Detalle_Ruta/delete/{id}','DetalleRutaController@deleteDR')->name('eliminarDR');
Route::get('Detalle_Ruta/update/{id}','DetalleRutaController@updateDR')->name('ActualizarDR');
Route::post('Detalle_Ruta/update','DetalleRutaController@updateBDDR')->name('actualizarBDDR');
#endregion

#region TiposProgramacion
Route::get('Tipos_Programas/listjsonp','ProgramasController@resuljson2')->name('listTPJ');
Route::get('Tipos_Programas/index','ProgramasController@VerTipos')->name('VerTiposProgramas');
Route::post('Tipos_Programas/index','ProgramasController@InsertarTipoP')->name('InsertarTipoPro');
Route::get('Tipos_Programas/lista','ProgramasController@VerTiposlista')->name('ListTP');
Route::get('Tipos_Programas/delete/{id}','ProgramasController@deleteTP')->name('eliminarTP');
Route::get('Tipos_Programas/update/{id}','ProgramasController@updateTP')->name('ActualizarTP');
Route::post('Tipos_Programas/update','ProgramasController@updateBDTP')->name('actualizarBDTP');
#endregion

#region Competencia Has Ruta
Route::get('Competencias_has_Ruta/index','CompetenciaHasRutaController@index')->name('indexCompRuta');
Route::post('Competencias_has_Ruta/index','CompetenciaHasRutaController@GuardarCompetencia')->name('GuardarCR');
Route::get('Competencias_has_Ruta/lista','CompetenciaHasRutaController@indexL')->name('ListCDR');
Route::get('Competencias_has_Ruta/listjsonp','CompetenciaHasRutaController@resultjson')->name('listCDRJ');
Route::get('Competencias_has_Ruta/delete/{id}','CompetenciaHasRutaController@deleteCDR')->name('eliminarCDR');
Route::get('Competencias_has_Ruta/update/{id}','CompetenciaHasRutaController@updateCDR')->name('ActualizarCDR');
Route::post('Competencias_has_Ruta/update','CompetenciaHasRutaController@updateBDCDR')->name('actualizarBDCDR');
#endregion

#region programas
Route::get('programas/listjsonp','ProgramasController@resuljson')->name('listjp');
Route::get('programas/index','ProgramasController@ver')->name('programas.index');
Route::get('programas/lista','ProgramasController@verl')->name('programas.lista');
Route::post('programas/index','ProgramasController@InsertP')->name('insertarPrograma');
Route::get('programas/detele/{id}','ProgramasController@deletePro')->name('eliminarPrograma');
Route::get('programas/update/{id}','ProgramasController@updatePro')->name('actualizarPrograma');
Route::post('programas/update','ProgramasController@updateBDPro')->name('actualizarBDPrograma');

#endregion

#region competencia
Route::get('competencias/listjsonr','CompetenciasController@resultjson')->name('listjc');
Route::post('competencias/index','CompetenciasController@store')->name('insertCompetencia');
Route::get('competencias/index','CompetenciasController@verC')->name('vercompetencias');
Route::get('competencias/lista','CompetenciasController@verl')->name('competencia.lista');
Route::get('competancias/delete/{id}','CompetenciasController@delecteCo')->name('eliminarcompetencia');
Route::get('competencias/update/{id}','CompetenciasController@updateCo')->name('actualizarCompetencia');
Route::post('competencias/update','CompetenciasController@updateBDCo')->name('actualizarBDcompetencia');
#endregion

#region Resultado_competencias
Route::get('resultado_competencias/listjsonrs','Resultado_programasController@resultjson')->name('listjr');
Route::post('resultado_competencias/index','Resultado_programasController@insertRs')->name('InsertR');
Route::get('resultado_competencias/index','Resultado_programasController@viewC')->name('getCompetencia');
Route::get('resultado_competencias/lista','Resultado_programasController@verl')->name('resultado.lista');
Route::get('resultado_competencias/delete/{id}','Resultado_programasController@deleteR')->name('eliminarResultadoCompetencia');
Route::get('resultado_competencias/update/{id}','Resultado_programasController@updateR')->name('actualizarResultaodCompetencia');
Route::post('resultado_competencias/update','Resultado_programasController@updateBDR')->name('actualizarBDResultadoCompetencia');

#endregion

#region ficha
//Route::get('fichas/index','FichaController@indexf')->name('verficha');
Route::get('fichas/listjsonf','FichaController@resultjson')->name('listjf');
Route::get('fichas/index','FichaController@viewP')->name('getProgramas');
Route::post('ficha/index','FichaController@guardarficha')->name('guardarF');
Route::get('ficha/lista','FichaController@verl')->name('listaF');
Route::get('ficha/delete/{id}','FichaController@delecteFi')->name('eliminarFicha');
Route::get('ficha/update/{id}','FichaController@updateFi')->name('actualizarFicha');
Route::post('ficha/update','FichaController@updateBDFi')->name('actualizarBDFicha');
#endregion

#region instructor
Route::get('instructor/listjsoni','InstructorController@resultjson')->name('listji');
Route::get('instructor/index','InstructorController@verI')->name('getInstructor');
Route::post('instructor/index','InstructorController@GuardarI')->name('guardarinstructor');
Route::get('instructor/lista','InstructorController@verL')->name('listaI');
Route::get('instructor/delete/{id}','InstructorController@deleteI')->name('eliminarInstructor');
Route::get('instructor/update/{id}','InstructorController@updateI')->name('actualizarInstructor');
Route::post('instructor/update','InstructorController@updateIBD')->name('actualizarBDInstructor');
#endregion

#region aprendiz
Route::get('aprendiz/listjsona','AprendizController@resultjson')->name('listja');
Route::get('aprendiz/index','AprendizController@getaprendiz')->name('irAprendiz');
Route::post('aprendiz/index','AprendizController@saveAprendiz')->name('gAprendiz');
Route::get('aprendiz/lista','AprendizController@gAprendizL')->name('gLAprendiz');
Route::get('aprendiz/delete/{id}','AprendizController@delecteA')->name('eliminarAprendiz');
Route::get('aprendiz/update/{id}','AprendizController@updateA')->name('actualizarAprendiz');
Route::post('aprendiz/update','AprendizController@updateBDA')->name('actualizarBDA');
#endregion

#region Usuarios
Route::get('usuario/listajsonu','UsuarioController@resultjson')->name('listju');
Route::get('usuario/index','UsuarioController@verU')->name('verusuario');
Route::post('usuario/index','UsuarioController@saveUsuario')->name('saveusuario');
Route::get('usuario/lista','UsuarioController@verL')->name('listUsuario');
Route::get('usuario/delete/{id}','UsuarioController@deleteUser')->name('eliminarUsuario');
Route::get('usuario/update/{id}','UsuarioController@updateUser')->name('actualizarUsuario');
Route::POST('usuario/update','UsuarioController@updateBDUser')->name('actualizarBDU');
#endregion

Route::get('programacion/listajsonu','ProgramacionController@resultjson')->name('listPcion');
Route::get('programacion/index','ProgramacionController@index')->name('indexPcion');
Route::post('programacion/index','ProgramacionController@GuardarPro')->name('GPcion');
Route::get('programacion/lista','ProgramacionController@indexl')->name('IndexLPcion');
Route::get('programacion/delete/{id}','ProgramacionController@delectePro')->name('eliminarPcion');
Route::get('programacion/update/{id}','ProgramacionController@updatePro')->name('actualizarPcion');
Route::post('programacion/update','ProgramacionController@updateBDPro')->name('actualizarBDPcion');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('Register/Instructores','Auth\RegisterController@regis')->name('registrarI');

Route::get('Perfil/Aprendiz/','AprendizController@perfil')->name('perfilA');
Route::post('Editar/Aprendiz','AprendizController@updta')->name('editEP');
Route::get('Perfil/Instructor','InstructorController@verP')->name('perfilIn');
Route::post('programa/ambiente','AmbienteController@verProgramas')->name('programacionAm');
