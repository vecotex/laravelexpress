<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Http\Requests\PostRequest;

class PostsAdminController extends Controller
{
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function index()
    {
        $posts = $this->post->paginate(5);
        return view('admin.posts.index', compact('posts'));
    }
    
    public function create()
    {
        return view('admin.posts.create');
    }
    public function store(PostRequest $request)
    {
        //dd($request->all()); //die dump - mata aplicação e mostra os resultados.
        $tags = array_filter(array_map('trim',explode(',', $request->tags)));
        
        $tagsIDs = [];
        foreach($tags as $tagName)
        {
            $tagsIDs[] = Tag::firstOrCreate(['name'=>$tagName])->id;
        }
                
        $post = $this->post->create($request->all()); //acredito que o create é interno do sistmea e não o create da função acima
        $post->tags()->sync($tagsIDs);

        return redirect()->route('admin.posts.index');
    }
    public function edit($id)
    {
        $post = $this->post->find($id);
        return view('admin.posts.edit', compact ('post'));
    }
    public function update($id, PostRequest $request)
    {
        $this->post->find($id)->update($request->all());
        return redirect()->route('admin.posts.index');
    }
    public function destroy($id)
    {
        $this->post->find($id)->delete();
        return redirect()->route('admin.posts.index');
    }
    
    //Feito por mim
    public function postagem()
    {
        $posts = $this->post->paginate(5);
        return view('admin.posts.postagem', compact('posts'));
    }
}
