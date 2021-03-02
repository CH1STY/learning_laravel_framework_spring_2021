<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhysicalStore extends Model
{
    //
    protected $table = 'physical_store_channel';
    protected $primaryKey = 'id';
    protected $fillable = array('customer_name','address','phone','product_id','product_name','unit_price','quantity','total_price','date_sold','payment_type','status');
    public $timestamps = true;

    const CREATED_AT = 'date_sold';
    const UPDATED_AT = 'date_sold';
}
