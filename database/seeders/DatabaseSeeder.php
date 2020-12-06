<?php

namespace Database\Seeders;

use App\Models\Comments;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Category;
use \App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::disableForeignKeyConstraints();
        DB::table('categories')->truncate();
        Category::factory()->create([
            "category" => "General",
        ]);
       Category::factory()->create([
            "category" => "Sexualidad",
        ]);
        Category::factory()->create([
            "category" => "Consejos",
        ]);
        Category::factory()->create([
            "category" => "Videojuegos",
        ]);
        Category::factory()->create([
            "category" => "Series",
        ]);
        Category::factory()->create([
            "category" => "Paranormal",
        ]);
        Category::factory()->create([
            "category" => "Musica",
        ]);
        Category::factory()->create([
            "category" => "Gastronomia",
        ]);
        Category::factory()->create([
            "category" => "Noticias",
        ]);
        Category::factory()->create([
            "category" => "Politica",
        ]);
        Category::factory()->create([
            "category" => "LGBTQ+",
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        Schema::enableForeignKeyConstraints();
        //User::factory(150)->create();
        //Post::factory(100)->create();
        //Comments::factory(200)->create();

    }
}
