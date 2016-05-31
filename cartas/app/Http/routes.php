<?php
use App\Plantilla;
use App\Carta;
use App\Http\Controllers\IndexController;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/


/*Route::get('/', function () {
    return view('login');
});



/* Authentication routes */
Route::get('crear_carta',function(){
	return view('crearvista');
});


/* Index */
Route::get('/', function () {
    return view('index');
});


/* Authentication routes */

//login
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');

//logout
Route::get('logout', 'Auth\AuthController@logout');


/* Registration routes */

Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');

/*Route::get('/home', 'HomeController@index');*/

Route::get('miscartas','CartaController@miscartas');

Route::get('mismodelos','ModeloController@mismodelos');

Route::post('crear','ModeloController@crear');

Route::get('compartidos','ModeloController@compartidos');

Route::post('compartir','ModeloController@compartir');

Route::get('descargar/{nombre}','PdfController@descargar');

Route::post('guardar','PdfController@guardar');

Route::get('plantillas/{id}','PlantillaController@armarplantilla');