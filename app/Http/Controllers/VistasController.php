<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class VistasController extends Controller
{

    public function general()
    {
        $general = $posts = Post::orderBy('created_at', 'DESC')->with('category','comment')->where('category_id','1')->paginate(100);
        $categories = Category::all();
        return Inertia::render('categories/General',[
            'categories' => $categories,
            'general' => $general
        ]);
    }
    public function sexualidad()
    {
        $sexualidad = Post::orderBy('created_at', 'DESC')->with('category','comment')->where('category_id','2')->paginate(100);
        $categories = Category::all();
       return Inertia::render('categories/Sexualidad',[
           'categories' => $categories,
           'sexualidad' => $sexualidad
       ]);
    }
    public function consejos()
    {
        $consejos = Post::orderBy('created_at', 'DESC')->with('category','comment')->where('category_id','3')->paginate(100);
        $categories = Category::all();
        return Inertia::render('categories/Consejos',[
            'categories' => $categories,
            'consejos' => $consejos
        ]);
    }
    public function videojuegos()
    {
        $videojuegos = Post::orderBy('created_at', 'DESC')->with('category','comment')->where('category_id','4')->paginate(100);
        $categories = Category::all();
        return Inertia::render('categories/Videojuegos',[
            'categories' => $categories,
            'videojuegos' => $videojuegos
        ]);
    }
    public function series()
    {
        $series = Post::orderBy('created_at', 'DESC')->with('category','comment')->where('category_id','5')->paginate(100);
        $categories = Category::all();
        return Inertia::render('categories/Series',[
            'categories' => $categories,
            'series' => $series
        ]);
    }
    public function paranormal()
    {
        $paranormal = Post::orderBy('created_at', 'DESC')->with('category','comment')->where('category_id','6')->paginate(100);
        $categories = Category::all();
        return Inertia::render('categories/Paranormal',[
            'categories' => $categories,
            'paranormal' => $paranormal,
        ]);
    }
    public function musica()
    {
        $musica = Post::orderBy('created_at', 'DESC')->with('category','comment')->where('category_id','7')->paginate(100);
        $categories = Category::all();
        return Inertia::render('categories/Musica',[
            'musica' => $musica,
            'categories' => $categories,
        ]);
    }
    public function gastronomia()
    {
        $gastronomia = Post::orderBy('created_at', 'DESC')->with('category','comment')->where('category_id','8')->paginate(100);
        $categories = Category::all();
        return Inertia::render('categories/Gastronomia',[
            'gastronomia' => $gastronomia,
            'categories' => $categories,
        ]);
    }
    public function noticias()
    {
        $noticias = Post::orderBy('created_at', 'DESC')->with('category','comment')->where('category_id','9')->paginate(100);
        $categories = Category::all();
        return Inertia::render('categories/Noticias',[
            'noticias' => $noticias,
            'categories' => $categories
        ]);
    }
    public function politica()
    {
        $politica = Post::orderBy('created_at', 'DESC')->with('category','comment')->where('category_id','10')->paginate(100);
        $categories = Category::all();
        return Inertia::render('categories/Politica',[
            'categories' => $categories,
            'politica' => $politica
        ]);
    }
    public function lgbtq()
    {
        $lgbtq = Post::orderBy('created_at', 'DESC')->with('category','comment')->where('category_id','11')->paginate(100);
        $categories = Category::all();
        return Inertia::render('categories/Lgbtq',[
            'categories' => $categories,
            'lgbtq' => $lgbtq
        ]);
    }
}
