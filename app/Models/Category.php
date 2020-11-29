<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'category', 'icon'
    ];

    protected $table = 'categories';

    //una categoria puede pertenecer a varios post
    public function Posts() {
        return $this->belongsToMany(Post::class);
    }
}
