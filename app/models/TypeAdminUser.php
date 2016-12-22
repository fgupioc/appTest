<?php

namespace appTest\models;

use Illuminate\Database\Eloquent\Model;

class TypeAdminUser extends Model
{
	protected $table = 'type_admin_user';
    public $timestamps = true;  
	protected $fillable = ['user_id','type_admin_id'];
	
	//relacion con la tabla type adim
	public function user(){
		return $this->belongsTo('appTest\User');		
	}
	//relacion con la tabla type admin
	public function typeAdmin(){ 
		return $this->belongsTo('appTest\models\TypeAdmin');
	}
}
