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
        /**
         * hacer validaciones
         */
        //Comments::create($request->all());
        $comment = [
            'comment' => $request->comment,
            'post_id' => $request->post_id,

        ];

        Comments::create($comment);
        /**
         * todo ver si hay otra manera de responder con un json
         */
        return back();
    }
}
