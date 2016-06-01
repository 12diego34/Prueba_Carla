<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\CartaUsuario as Carta;

class CartaController extends Controller
{
    public function cartas(Request $request){
        $usuario = $request->user();
        
        if (is_object($usuario)){
            $username = $usuario->email;
        }else{
            $username = "";
        }
        
        $cartas = Carta::where('usuario','=',$username)->get();
        return view("listarcartas",['cartas'=>$cartas]);
    }
}
