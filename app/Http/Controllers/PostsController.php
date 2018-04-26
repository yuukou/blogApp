<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests\PostRequest;
use App;
use Illuminate\Routing\Controller;
use App\Category;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Cache\Factory;
use Illuminate\Contracts\Cache\Repository;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function first() {
        return view('auth.first');
    }

    public function index() {

            $posts = Post::latest()->get();

        return view('posts.index')->with('posts', $posts);
    }

    public function show(Post $post) {

        $categories = $post->categories;
        return view('posts.show',['post'=>$post,'categories'=>$categories]);
    }

    public function create() {
        $categories = Category::all();
//        $categories = Cache::remember('categories_all', 60,function () {
//            return Category::all();
//        });
        return view('posts.create',['categories'=>$categories]);
    }

    public function store(PostRequest $request) {
        DB::transaction(function () use($request){
            $post = new Post();
            $post->title = $request->input('title');
            $post->body = $request->input('body');
            $post->save();
            $inserts = $request->kind;
            foreach ($inserts as $insert) {
                 $category_post = new App\CategoryPost();
                 $category_post->category_id = $insert;
                 $category_post->post_id = $post->id;
                 $category_post->save();
            }
        });

        return redirect()->action('PostsController@index');
    }

    public function edit(Post $post) {
        return view('posts.edit')->with('post', $post);
    }

    public function update(PostRequest $request, Post $post) {
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->categories()->kind = $request->input('kind');
        $post->save();
        return redirect('/home');
    }

    public function destroy(Post $post) {
        $post->delete();
        return redirect('/home');
    }
}












