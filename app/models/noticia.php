<?php

namespace appTest\models;

use Illuminate\Database\Eloquent\Model;

class noticia extends Model
{
	protected $table='noticias';
	public $timestamps = true;
    protected $fillable=['titulo','descripcion','urlImg'];
}
