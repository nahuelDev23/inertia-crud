<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'body','description','image','is_anon','user_id','category_id'
    ];
    protected $dates = ['created_at'];

    protected $appends = ['formateado'];


    public function getformateadoAttribute()
    {
        foreach($this->dates as $d){
            return $d = $this->$d->locale('es')->diffForHumans();
        }
    }

    //Un post puede tener un solo usuario como creador
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //un post puede tener varios comentarios
    public function comment()
    {
        return $this->hasMany(Comments::class)->orderBy('created_at','DESC');
    }

    //un post puede tener una categoria
    public function category() {
        return $this->belongsTo(Category::class);
    }
}
