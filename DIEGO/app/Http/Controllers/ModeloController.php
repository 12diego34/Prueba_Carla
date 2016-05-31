<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ModeloUsuario as Modelo;
use App\ModeloCompartido;

use DB;

class ModeloController extends Controller
{
    public function crear(Request $request){
    	$datos = $request->all();
    	$cadena = $datos["contenido"];
    	$nombre = $datos["nombre"];
    	$descripcion = $datos["descripcion"];
    	$cadena = preg_replace('/\[(\w+)\]/', '<span class="editable" contenteditable="true">${1}</span>', $cadena);
    	$plantilla = new Modelo;
        
        if (is_object($request->user())){
            $usuario = $request->user()->email;
        }else{
            $usuario = "Visitante";
        }

    	$plantilla->usuario =$usuario;
    	$plantilla->contenido = $cadena;
    	$plantilla->nombre = $nombre;
    	$plantilla->descripcion = $descripcion;
    	$plantilla->save();
    	return "1";
    }

    public function mismodelos(Request $request){

        $usuario = $request->user();
        if (is_object($usuario)){
            $username = $usuario->email;
        }else{
            $username = "";
        }
        
    	$modelos = Modelo::where('usuario','=',$username)->get();
    	return view("listarplantillas",['modelos'=>$modelos]);
    }
}
