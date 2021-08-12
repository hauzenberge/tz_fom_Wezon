<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Coments;

class CommentsController extends Controller
{
    public function index(){
        return view('admin_panel.comentaries.index', [
            'comentaries' => Coments::all(),
        ]);
    }

    public function fromPost($id){
        return view('admin_panel.comentaries.index', [
            'comentaries' => Coments::where('news_id', '=', $id)->get(),
        ]);
    }

    public function edit($id){
        return view('admin_panel.comentaries.edit', [
            'id' => $id,
            'coment' => Coments::find($id),
        ]);
    }

    public function update($id, Request $request){
        $coment = Coments::find($id);
        $coment->user_name = $request->input('user_name');
        $coment->status = $request->input('status');
        $coment->body = $request->input('coment');

        $coment->save();

        return redirect('/comentaries/edit/'.$id);
    }

    public function destroy($id){
        $coment = Coments::find($id);
        $coment->delete();
        return redirect('/comentaries');
    }

    public function store($id, Request $request){
        //dd($id);
       // dd($request->input('coment'));
        $coment = new Coments;
        $coment->user_name = $request->input('user_name');
        $coment->status = 'no_published';
        $coment->news_id = $id;
        $coment->body = $request->input('coment');

        $coment->save();

        return redirect('/post/'.$id);
    }
    
}
