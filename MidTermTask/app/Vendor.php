<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vendor extends Model
{
    //
    protected $table = 'vendors';
    protected $primaryKey = 'id';
    
    public $timestamps = true;

    const CREATED_AT = 'date_added';
    const UPDATED_AT = 'last_updated';
}
