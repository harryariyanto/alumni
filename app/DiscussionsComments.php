<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiscussionsComments extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id_dcomment';
    protected $table = 'DiscussionsComments';
    public $timestamps = true;
}
