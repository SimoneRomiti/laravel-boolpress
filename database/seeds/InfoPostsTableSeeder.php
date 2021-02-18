<?php

use Illuminate\Database\Seeder;
use App\InfoPost;
use App\Post;
use Faker\Generator as Faker;

class InfoPostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $array = ['public', 'private', 'draft'];
        $array2 = ['open', 'close', 'private'];

        $posts = Post::all();
        foreach ($posts as $post) {
            $info = new InfoPost();
            $info->post_id = $post->id;
            $info->post_status = $faker->randomElement($array);
            $info->comment_status = $faker->randomElement($array2);
            $info->save();
        }
        
    }
}
