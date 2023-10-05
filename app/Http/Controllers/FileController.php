<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class FileController extends Controller
{
    public function create()
    {
        $images = Image::all();
        return view('index')->with(array('images'=>$images));
    }
    public function store(Request $request){
        $this->validate($request, [
                'image_path' => 'required',
                'image_path.*' => 'image'
        ]);
  
        $files = [];
        if($request->hasfile('image_path'))
         {
            foreach($request->file('image_path') as $file)
            {
                $name = time().rand(1,50).'.'.$file->extension();
                $file->move(public_path('files'), $name);  
                //$files[] = $name;  
  
                $file= new Image();
                $file->image_path = $name;
                $file->name = $name;
                $file->save();
            }
         }
  
        return back()->with('success', 'Images are successfully uploaded');
    }
}
