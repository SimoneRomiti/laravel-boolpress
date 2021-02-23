<?php

use Illuminate\Database\Seeder;
use App\Image;
use Faker\Generator as Faker;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker){

        for($i = 0; $i < 6; $i++){
            $image = new Image;
            $image->link = $faker->image('public/images', 640, 480, 'nature', false);
            $image->alt = 'immagine_'.($i+1);
            $image->caption = $faker->sentences(2, true);
            $image->save();
        }
        
    }
    
}
