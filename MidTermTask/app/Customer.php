<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    
    protected $table = 'customers';
    protected $primaryKey = 'id';
    
    public $timestamps = true;

    const CREATED_AT = 'date_added';
    const UPDATED_AT = 'last_updated';
}
