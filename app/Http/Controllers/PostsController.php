<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function  index(){
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }
    public function create ()
    {
        return view(admin.posts.create);
    }
}
