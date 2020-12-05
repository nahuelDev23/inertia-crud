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
        $data = [
            'title' => $request->title,
            'body' => nl2br($request->body),
            'description' => $request->description,
            'image' => $request->image,
            'is_anon' => $request->is_anon,
            'category_id' => $request->category_id,

        ];
        $post = Post::create($data);
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
       $post = Post::where('id',$id)->with('user')->get();
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('home');
    }
}
