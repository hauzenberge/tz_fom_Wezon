<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\News;
use App\Coments;

class BlogController extends Controller
{
    public function index(){
        return view('index',[
            'posts' => News::where('status', '=', 'published')->get(),
        ]);
    }
    public function Post($id){
        //dd(Coments::where('news_id', '=', $id)->get());
        return view('post', [
            'post' => News::find($id),
            'coments' => Coments::where('news_id', '=', $id)
                ->where('status', '=', 'published')
                ->get(),
        ]);
    }
}
