<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModeloCompartido extends Model
{
    protected $table = 'modelo_compartidos';
  	protected $fillable = ['emisor', 'destinatario','id_modelo'];
  	protected $guarded = ['id'];
}
