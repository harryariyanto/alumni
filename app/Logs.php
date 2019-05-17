<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id_log';
    protected $table = 'Logs';
    protected $fillable = array(
        'content',
		'timestamp',
        'id_user',
        'id_object'
    );
    public $timestamps = false;
}
