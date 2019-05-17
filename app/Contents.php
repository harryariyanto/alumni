<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contents extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id_content';
    protected $table = 'contents';
    protected $fillable = array(
        'title',
        'content',
        'status',
        'id_user'
    );
    public $timestamps = true;
}
