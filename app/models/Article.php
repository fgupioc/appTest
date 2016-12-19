<?php

namespace appTest\models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public $timestamps= true;
    protected $fillable=['category_id','code','name','stock','description','image','state'];
    
}