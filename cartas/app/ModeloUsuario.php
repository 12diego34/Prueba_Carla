<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModeloUsuario extends Model
{
    protected $table = 'modelo_usuarios';
  	protected $fillable = ['contenido', 'usuario','descripcion','nombre'];
  	protected $guarded = ['id'];
}
