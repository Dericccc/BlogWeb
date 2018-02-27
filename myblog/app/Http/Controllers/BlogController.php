<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests;
class BlogController extends Controller
{
    public function getSingle($slug){
        $post = Post::where('slug', '=' , $slug)->first();
//        $post = Post::find($id);
        return view('blog.single')->withPost($post);

    }

    public function getIndex(){

     $posts = Post::paginate(2);

     return view('blog.index')->withPosts($posts);

    }
}
