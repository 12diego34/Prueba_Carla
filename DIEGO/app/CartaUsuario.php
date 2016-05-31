<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartaUsuario extends Model
{
    protected $table = 'carta_usuario';
  	protected $fillable = ['usuario','nombrearchivo','patharchivo'];
  	protected $guarded = ['id'];
}
