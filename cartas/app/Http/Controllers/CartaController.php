<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\CartaUsuario as Carta;

use DB;
class CartaController extends Controller
{
    public function miscartas(Request $request){
    	$usuario = $request->user();
        /*Este control debe desaparecer si se supone
        que el usuario siempre debe estar logueado para
        entrar a esta ruta*/
        if (is_object($usuario)){
            $username = $usuario->email;
        }else{
            $username = "";
        }
        
    	$cartas = Carta::where('usuario','=',$username)->get();
    	return view("miscartas",['cartas'=>$cartas]);
    }
}
