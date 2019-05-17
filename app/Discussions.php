<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discussions extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id_discussions';
    protected $table = 'Discussions';
    public $timestamps = true;
}
