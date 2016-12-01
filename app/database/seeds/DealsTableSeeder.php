<?php

use Faker\Factory as Faker;

class DealsTableSeeder extends Seeder {

   public function run()
   {
       DB::table('deals')->truncate();
       $faker = Faker::create();
       $users = User::all()->lists('id');
       foreach(range(1, 10) as $index)
       {
           Deal::create([
               'user_id' => $faker->randomElement($users),
               'title' => $faker->word,
               'pic_url' => $faker->imageUrl($width = 640, $height = 480),
               'description' => $faker->text,
               'price' => $faker->randomFloat(2, 5, 100),
           ]);
       }
   }

}