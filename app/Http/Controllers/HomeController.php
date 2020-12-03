<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;
class HomeController extends Controller
{
    public function index(Request $request)
    {

       $posts = Post::orderBy('created_at', 'DESC')->with('category','comment')->paginate(9);
       $categories = Category::all();
        if($request->wantsJson()){
            return $posts;
        }
        return Inertia::render('Home',[
            'categories' => $categories,
            'posts' => $posts
        ]);
    }


}
