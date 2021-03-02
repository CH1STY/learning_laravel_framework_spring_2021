<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EcommerceStore extends Model
{
    //
    protected $table = 'ecommerce_channel';
    protected $primaryKey = 'id';
    
    public $timestamps = true;

    const CREATED_AT = 'date_sold';
    const UPDATED_AT = 'date_sold';
}
