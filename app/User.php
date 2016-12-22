<?php

namespace appTest;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    //esta relacion es de muchos a muchos con la tabla typeadmin directamente 
    //$user= User::find(1);
    //$user->tipoAdmins->first()->name
    public function tipoAdmins(){
        return $this->belongsToMany('appTest\models\TypeAdmin')->withTimestamps();
    }

    //se relacioan con la tabla typeadminuser de uno a uno
    //$user->typeAdminUser->typeAdmin->name
    public function typeAdminUser(){  
         return $this->hasone('appTest\models\TypeAdminUser');
    }
         
}
