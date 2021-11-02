<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function list()
    {
        $posts = Post::latest()->paginate(10);
        //  return response()->json(['posts' => $posts]);
        return view("post.list")->with(['posts' => $posts]);
    }
    public function delete(Request $req)
    {
        Post::where('id','=',$req->id)->delete();
        return redirect()->back();
        // Post::whereId($req->id)->delete();
        // Post::where(['id' => $req->id])->delete();
        // $post = Post::find($req->id);
        // $post->delete();
    }

    public function edit(Request $req)
    {
        $post = Post::find($req->id);
        return view("post.edit")->withPost($post);
    }

    public function update(Request $req)
    {
        // $post = Post::whereId($req->id)->update([
        //     "title" => $req->title ,
        //     "description" => $req->description ,
        //     "author" => $req->author ,
        // ]);
        $post = Post::find($req->id);
        $post->title = $req->title;
        $post->description = $req->description;
        $post->author = $req->author;
        $post->save();
        // $post->update($req->all());
        return redirect()->route("post.list");
        
    }
}
