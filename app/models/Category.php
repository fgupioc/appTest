<?php

namespace appTest\models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     
    public $timestamps = true;
    protected $fillable=['name','description','condition'];

}
