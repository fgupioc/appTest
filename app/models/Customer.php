<?php

namespace appTest\models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $timestamps= true;
    protected $fillable=['type_person','name','type_document','num_document','address','phone','email'];
}
