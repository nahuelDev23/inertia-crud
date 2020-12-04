<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComment;
use App\Models\Comments;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CommentsController extends Controller
{
    public function store(StoreComment $request)
    {

        $comment = new Comments();
        $comment->comment =  $request->comment;
        $comment->is_anon = $request->is_anon;
        $comment->post_id = $request->post_id;
        $comment->save();

        /**
         * todo ver si hay otra manera de responder con un json
         */
        return back();
    }
}
