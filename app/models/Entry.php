<?php

namespace appTest\models;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{ 
    public $timestamps = true;
    protected $fillable=['customer_id','type_document','serie_document','num_document','date','tax','state'];
}
