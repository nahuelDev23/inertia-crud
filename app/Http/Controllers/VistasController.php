<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class VistasController extends Controller
{

    public function general()
    {
        $categories = Category::all();
        return Inertia::render('categories/General',[
            'categories' => $categories
        ]);
    }
    public function sexualidad()
    {
        $categories = Category::all();
       return Inertia::render('categories/Sexualidad',[
           'categories' => $categories
       ]);
    }
    public function consejos()
    {
        $categories = Category::all();
        return Inertia::render('categories/Consejos',[
            'categories' => $categories
        ]);
    }
    public function videojuegos()
    {
        $categories = Category::all();
        return Inertia::render('categories/Videojuegos',[
            'categories' => $categories
        ]);
    }
    public function series()
    {
        $categories = Category::all();
        return Inertia::render('categories/Series',[
            'categories' => $categories
        ]);
    }
    public function paranormal()
    {
        $categories = Category::all();
        return Inertia::render('categories/Paranormal',[
            'categories' => $categories
        ]);
    }
    public function musica()
    {
        $categories = Category::all();
        return Inertia::render('categories/Musica',[
            'categories' => $categories
        ]);
    }
    public function gastronomia()
    {
        $categories = Category::all();
        return Inertia::render('categories/Gastronomia',[
            'categories' => $categories
        ]);
    }
    public function noticias()
    {
        $categories = Category::all();
        return Inertia::render('categories/Noticias',[
            'categories' => $categories
        ]);
    }
    public function politica()
    {
        $categories = Category::all();
        return Inertia::render('categories/Politica',[
            'categories' => $categories
        ]);
    }
    public function lgbtq()
    {
        $categories = Category::all();
        return Inertia::render('categories/Lgbtq',[
            'categories' => $categories
        ]);
    }
}
