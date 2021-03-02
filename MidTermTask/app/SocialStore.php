<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialStore extends Model
{
    //
    protected $table = 'social_media_channel';
    protected $primaryKey = 'id';
    
    public $timestamps = true;

    const CREATED_AT = 'date_sold';
    const UPDATED_AT = 'date_sold';
}
