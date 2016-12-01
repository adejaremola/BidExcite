<?php 

use Faker\Factory as Faker;

class CommentsTableSeeder extends Seeder {

   public function run()
   {
       DB::table('comments')->truncate();
       $faker = Faker::create();
       $users = User::all()->lists('id');
       $blogs = Blog::all()->lists('id');
       foreach(range(1, 30) as $index)
       {
           Comment::create([
               'user_id' => $faker->randomElement($users),
               'blog_id' => $faker->randomElement($blogs),
               'content' => $faker->text,
           ]);
       }
   }

}