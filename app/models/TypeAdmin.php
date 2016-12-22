<?php

namespace appTest\models;

use Illuminate\Database\Eloquent\Model;

class TypeAdmin extends Model
{
   
    public $timestamps= true;
    protected $fillable=['abbreviation', 'nombre'];

    //relacion directamente con la tabla user de muchos a mucho 
    public function tipoAdmins(){
        return $this->belongsToMany('appTest\User')->withTimestamps();
    }

    //relaicon con la tabla typeadminauser
   public function typeAdminUser(){
		return $this->hasone('appTest\models\TypeAdminUser');
	}
}
