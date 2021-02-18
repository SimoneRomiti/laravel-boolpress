<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Comment;
use Faker\Generator as Faker;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $posts = Post::all();
        foreach ($posts as $post) {
            for($i = 0; $i < 3; $i++){
                $comment = new Comment();
                $comment->post_id = $post->id;
                $comment->author = $faker->name;
                $comment->text = $faker->text(250);
                $comment->published_at = $faker->dateTimeBetween($post->published_at);

                $comment->save();
            }
            
        }
    }
}
