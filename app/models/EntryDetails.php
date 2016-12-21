<?php

namespace appTest\models;

use Illuminate\Database\Eloquent\Model;

class EntryDetails extends Model
{
    //`,
    public $timestamps = true;
    protected $fillable=['entry_id','article_id','quantity','price_buy', 'price_sale'];
}
