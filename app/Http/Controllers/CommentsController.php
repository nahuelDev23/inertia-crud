<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        /**
         * hacer validaciones y que se refresquen los comentarios o que se ponga el ultimo arriba de todo
         * para no tener q refrescar..
         */
        Comments::create($request->all());
    }
}
