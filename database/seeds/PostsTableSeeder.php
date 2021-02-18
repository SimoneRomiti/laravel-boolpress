<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Generator as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 10; $i++){
            $post = new Post();
            $post->title = $faker->words(3, true);
            $post->text = $faker->text(1000);
            $post->author = $faker->name;
            $post->published_at = $faker->dateTime();

            $post->save();
        }
        
    }
}
