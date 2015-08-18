<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsAdminController extends Controller
{
    /**
     * @var Post
     */
    private $post;

    public function __construct(Post $post){
        $this->post = $post;
    }

    public function index(){
        $posts = $this->post->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function create(){
        return view('admin.posts.create');
    }

    public function store(PostRequest $request){
        //dd = died dump
        //dd($request->all());
        $this->post->create($request->all());
        return redirect()->route('admin.posts.index');
    }

    public function edit($id){
        $post = $this->post->find($id);
        return view('admin.posts.edit', compact('post'));
    }

    public function update($id, PostRequest $postRequest){
        $this->post->find($id)->update($postRequest->all());
        return redirect()->route('admin.posts.index');
    }

    public function destroy($id){
        $this->post->find($id)->delete();
        return redirect()->route('admin.posts.index');
    }
}
