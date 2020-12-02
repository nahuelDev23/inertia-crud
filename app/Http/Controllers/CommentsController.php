<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Inertia\Inertia;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        /**
         * hacer validaciones
         */
        Comments::create($request->all());
        /**
         * todo ver si hay otra manera de responder con un json
         */
        return back();
    }
}
