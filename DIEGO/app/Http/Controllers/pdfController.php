<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\CartaUsuario as Carta;
use Storage;
use PDF;
use Response;

class PdfController extends Controller
{
    
	public function guardarpdf(Request $request){

    	// Crea el pdf correspondiente, lo guarda en el servidor
    	// y lo mando al browser
		$datos = $request->all();
		$usuario = $request->user()->email;
	    $pdf = PDF::loadHTML($datos["contenido"]);
	    $carta = new Carta;
	    $carta->usuario = $usuario;
	    $carta->nombrearchivo = $datos["nombre_archivo"];
	    $carta->save();
	    $carta->patharchivo = storage_path('app')."/".$carta->id.".pdf";
	    $carta->save();
		Storage::disk('local')->put($carta->id.".pdf",$pdf->output());
		return "1";
	}

	public function descargarpdf($nombre){
		$file= storage_path('app')."/".$nombre.".pdf";
        $headers = array(
              'Content-Type: application/pdf',
            );
        return Response::download($file, 'carta.pdf', $headers);
	}
}
