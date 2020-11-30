<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Inertia\Inertia;
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
    public function store()
    {
        /**
         * hacer la validacion en otro lado
         */
       
        $post = Post::create(
            /**
             * pensar las validaciones
             */
            $this->validate(request(),[
                'title' => ['required', 'max:60'],
                'body' => ['required'],
                'description' => ['required', 'max:100'],
                'category_id' => ['required'],
                'is_anon' => ['required'],
            ])
        );

        /**
         * Ver si esto se puede meter en un event/listener
         */
        $scoreActual = User::select('score')->where('id',auth()->id())->get();
        User::where('id',auth()->id())->update(['score'=>$scoreActual[0]['score']+100]);

        /**
         * redireccionar al post recien creado
         */
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $post = Post::findOrFail($id);
       $categories = Category::all();
        return Inertia::render('post/show',[    
            'post' => $post,
            'categories'=>$categories
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
