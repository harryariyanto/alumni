<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id_news';
    protected $table = 'News';
    // protected $fillable = array(
    //     'title',
    //     'content',
    //     'img_url',
    //     'status',
    //     'id_user',
    //     'created_at',
    //     'updated_at'
    // );
}
