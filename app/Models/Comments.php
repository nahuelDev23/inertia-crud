<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment', 'user_id','post_id','image'
    ];

    protected $dates = ['created_at'];

    protected $appends = ['formateado'];


    public function getformateadoAttribute()
    {
        foreach($this->dates as $d){
            return $d = $this->$d->locale('es')->diffForHumans();
        }

    }

    //Un comentario solo puede tener un usuario creador
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //u ncomentartio solo puede pertenecer a un post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }


}
