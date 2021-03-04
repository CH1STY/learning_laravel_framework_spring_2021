<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';

    protected $primaryKey = 'id';
    protected $fillable = array('product_name','category','unit_price','quantity','status','date_added','last_updated');

    
    public $timestamps = true;

    const CREATED_AT = 'date_added';
    const UPDATED_AT = 'last_updated';
}
