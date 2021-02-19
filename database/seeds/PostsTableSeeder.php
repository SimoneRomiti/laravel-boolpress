<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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
            $post->slug = Str::slug($post->title, '-');
            $post->img = $faker->imageUrl(640, 480, 'food', false);
            $post->text = $faker->text(1000);
            $post->author = $faker->name;
            $post->published_at = $faker->dateTime();

            $post->save();
        }
        
    }
}
