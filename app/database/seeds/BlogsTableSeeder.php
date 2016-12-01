<?php 

use Faker\Factory as Faker;

class BlogsTableSeeder extends Seeder {

   public function run()
   {
       DB::table('blogs')->truncate();
       $faker = Faker::create();
       $users = User::all()->lists('id');
       foreach(range(1, 10) as $index)
       {
           Blog::create([
               'user_id' => $faker->randomElement($users),
               'title' => $faker->word,
               'content' => $faker->text,
               'pic_url' => $faker->imageUrl($width = 640, $height = 480),
           ]);
       }
   }

}