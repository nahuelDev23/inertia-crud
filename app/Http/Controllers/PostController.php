<?php

namespace App\Http\Controllers;

use App\Events\increaseScoreEvent;
use App\Models\Comments;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Inertia\Inertia;
use App\Http\Requests\StorePost;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost $request)
    {
        /**
         * hacer que acepte tags html lo hago al final con ck editor
         * hacer que sume puntos cuando el post tenga mas de 10 comentarios
         * hacer boton editar 500 puntos -- ok
         * hacer boton borrar 1000 puntos
         * hacer comentario anonimo con 1500
         * agregar ckeditor
         */

        $post = Post::create($request->all());
        event(new increaseScoreEvent(50));
        return redirect()->route('post.show',$post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Inertia\Response
     */
    public function show($id)
    {
        /**
         * paginar comentarios
         */
       $post = Post::where('id',$id)->get();
       $categories = Category::all();
       $comments = Comments::where('post_id',$id)
           ->with('user')
           ->orderBy('created_at','DESC')
           ->get();

        return Inertia::render('post/show',[
            'post' => $post,
            'categories'=>$categories,
            'comments' => $comments,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return Inertia::render('post/edit',[
            'post' =>[
                'id' => $post->id,
                'title' => $post->title,
                'description' => $post->description,
                'body' => $post->body,
                'image' => $post->image,
                'category_id'=>$post->category_id,
                'is_anon' => $post->is_anon,
            ],
            'categories'=>$categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePost $request,Post $post)
    {
        $post->update($request->all());
        return redirect()->route('post.show',$post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
