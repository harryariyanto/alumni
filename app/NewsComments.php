<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsComments extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id_ncomment';
    protected $table = 'NewsComments';
    protected $fillable = array(
        'content',
        'status',
    );
}
