<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhysicalStore extends Model
{
    //
    protected $table = 'physical_store_channel';
    protected $primaryKey = 'id';
    
    public $timestamps = true;

    const CREATED_AT = 'date_sold';
    const UPDATED_AT = 'date_sold';
}
