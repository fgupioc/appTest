<?php

namespace appTest\models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{	 
    public $timestamps = true;
    protected $fillable = [ 'customer_id','user_id','type_document','serie_document','num_document','date','tatal_sale','state'];
}
