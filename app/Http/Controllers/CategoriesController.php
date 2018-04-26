<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Cache;
use App;
use App\Post;
use Illuminate\Contracts\Cache\Factory;
class CategoriesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function select() {
        $categories = Category::all();
        return view('categories.select',['categories'=>$categories]);
    }

    public function store(Request $request){
        $category = new Category();
        $category->kind = $request->kind;
        $category->save();
        return redirect('categories/');
    }

    public function destroy(Category $category) {
        $category->delete();
        return redirect()->back();
    }
}
















