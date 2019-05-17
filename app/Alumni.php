<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'alumni';
    protected $fillable = array(
        'front_name',
        'last_name',
        'birth_date',
        'grad_year'
    );
    public $timestamps = false;
}
