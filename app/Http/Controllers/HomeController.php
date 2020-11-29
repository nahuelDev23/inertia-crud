<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;
class HomeController extends Controller
{
    public function index()
    {
       $posts = Post::orderBy('created_at', 'DESC')->with('category','comment')->paginate(100);
       $categories = Category::all();
        return Inertia::render('Home',[
            'categories' => $categories,
            'posts' => $posts
        ]);
    }


}
