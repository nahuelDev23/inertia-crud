<?php

namespace App\Http\Controllers;

use App\Events\increaseScoreCommentEvent;
use App\Http\Requests\StoreComment;
use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class CommentsController extends Controller
{
    public function store(StoreComment $request)
    {
        /**
         * cuento la cantidad de comentarios
         * si llega a 10 comments le doy 100p al autor del post
         */

        $countCommentPost = Comments::select('post_id')->where('post_id',$request->post_id)->whereNotIn('user_id',[$request->user_id_del_post])->count();

        $comment = new Comments();
        $comment->comment = nl2br($request->comment);
        $comment->is_anon = $request->is_anon;
        $comment->post_id = $request->post_id;
        $comment->save();

        $countCommentPost == 2  ?  event(new increaseScoreCommentEvent($request->user_id_del_post) ) : '';
        /**
         * todo ver si hay otra manera de responder con un json
         */
        return back();
    }
}
