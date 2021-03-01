<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class accountant extends Model
{
    //
    protected $table = 'accountants';
    protected $primaryKey = 'id';
    
    public $timestamps = true;

    const CREATED_AT = 'date_added';
    const UPDATED_AT = 'last_updated';
}
