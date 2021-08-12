<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Storage;
use App\PhotoGalerryItems;

class Files extends Model
{
    public function upload($fileinputname, $name, $src, $request){
    	$file = $request->file($fileinputname);
        //dd($file);
        if ($file != null) {
            $file->move(public_path() . '/app/public/'.$src,$name.'.png');
        }
    	
    	return 'Complete';	
    }

    public function uploadfiles($id, $request){
    	foreach ($request->file() as $file) {
                foreach ($file as $f) {
                	$name = time().'_'.$f->getClientOriginalName();
                    $f->move(public_path() . '/app/public/galleries/', $name);
                    $photo = new PhotoGalerryItems;
			    	$photo->photo_galerry_id = $id;
			    	$photo->image_src = '/app/public/galleries/'.$name;
			    	$photo->save();
                }
         }

    	return 'Complete';	
    }

    public function desletefile($src){
    	unlink(public_path($src));
    	return 'Complete';	
    }
}
