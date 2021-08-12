<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $fillable =['id', 'title', 'image', 'status', 'body'];

    static function Name($id){
        return News::find($id)->title;
    }
}
