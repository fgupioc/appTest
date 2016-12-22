<?php

namespace appTest\models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public $timestamps= true;
    protected $fillable=['category_id','code','name','stock','description','image','state'];
    
    public function category(){
    	return $this->belongsTo('appTest\models\Category');
    }
     public function entrydetails(){
    	return $this->hasMany('appTest\models\EntryDetails');
    }
}