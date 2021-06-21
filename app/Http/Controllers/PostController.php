<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller{

    //store post
    public function store(Request $request){
        
        //validation
        $this->validate($request, [
            'title' => 'required|string',
            'description' => 'required|string',
            'category_id' => 'required'
        ]);

        $formData = $request->all();
        $result = Post::create($formData);
        
        if($result){
            return 'Blog Post Save Success.';
        }else{
            return 'Blog Post Save Failed. Try Again!';
        }

    }

    //select post
    public function select(){
        $data = Post::all();
        return $data;
    }


    //update
    public function update(Request $request){
        $this->validate($request, [
            'title' => 'required|string',
            'description' => 'required|string',
            'category_id' => 'required',
            'id' => 'required'
        ]);

        $post = Post::find($request->id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->image = $request->image;
        $post->category_id = $request->category_id;
        $post->posted_by = $request->posted_by;
        $result = $post->save();

        if($result){
            return 'Post Update Success.';
        }else{
            return 'Post Update Failed. Try Again!';
        }
    }


    //delete
    public function delete(Request $request){
        $id = $request->id;
        $result = Post::where('id', $id)->delete();
        if($result){
            return 'Post Delete Success.';
        }else{
            return 'Post Delete Failed. Try Again!';
        }
    }
    
}
