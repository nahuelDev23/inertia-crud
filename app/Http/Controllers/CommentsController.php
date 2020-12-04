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
         * todo hacer que ande is_anon
         */
        Comments::create($request->all());
        /**
         * todo ver si hay otra manera de responder con un json
         */
        return back();
    }
}
