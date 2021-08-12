<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\News;
use App\Files;
use DB;

class NewsController extends Controller
{
    public function index(){
        return view('admin_panel.news.index',[
            'news' => News::all(),
        ]);
    }

    public function edit($id){
        return view('admin_panel.news.edit',[
            'id' => $id,
            'post' => News::find($id),
        ]);
    }

    public function update($id, Request $request){
        $post = News::find($id);

        $post->title = $request->input('title');

        if ($request->input('status') != null) {
            $post->status = $request->input('status');
        }
        
        $post->body = $request->input('post');

       
        if ($request->file('image') != null) {
            $post->image = '/app/public/post_images/'.$id.'.png';
            $uploaded = new Files;
            $uploaded->upload('image', $id, 'post_images/', $request);
        }
        

        $post->save(); 

        return redirect('/news/edit/'.$id);
    }

    public function destroyImage($id){
        $post = News::find($id);
        $destroy = new Files;
        $destroy->desletefile($post->image);
        $post->image = null;
        $post->save();

        return redirect('/news/edit/'.$id);


    }
    public function destroy($id){
        $post = News::find($id);
       
        if ($post->image != null) {
            $destroy = new Files;
            $destroy->desletefile($post->image);
            $post->image = null;
        }
        
        $post->delete();

        DB::delete('delete from comments where news_id = ?', [$id]);

        return redirect('/news/');

    }

    public function add(){
        return view('admin_panel.news.add');
    }

    public function store(Request $request){
        $post = new News;

        $post->title = $request->input('title');

        $post->status = $request->input('status');
        
        $post->body = $request->input('post');
        

        $post->save(); 

        return redirect('/news');
    }
}
