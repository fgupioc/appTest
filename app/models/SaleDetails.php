<?php

namespace appTest\models;

use Illuminate\Database\Eloquent\Model;

class SaleDetails extends Model
{
    public $timestamps = true;
    protected $fillable = [ 'sale_id','article_id','quantity','price_sale','discount'];
}
