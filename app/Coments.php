<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coments extends Model
{
    protected $table = 'comments';
    protected $fillable = ['id', 'user_name', 'news_id', 'status', 'body'];
}
