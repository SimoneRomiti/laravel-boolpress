<?php

use Illuminate\Database\Seeder;
use App\Tag;
use Illuminate\Support\Str;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tagArray = [
            'PHP',
            'LARAVEL',
            'JAVASCRIPT',
            'VUE',
            'HTML',
            'CSS'
        ];

        foreach ($tagArray as $tag) {
            $newTag = new Tag();
            $newTag->name = $tag;
            $newTag->slug = Str::slug($newTag->name, '-');

            $newTag->save();
        }
    }
}
