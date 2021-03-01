<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    
    public $timestamps = false;

    const CREATED_AT = 'date_added';
    const UPDATED_AT = 'last_updated';
}
