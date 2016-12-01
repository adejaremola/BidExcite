<?php

use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

   public function run()
   {
       DB::table('users')->truncate();
       $faker = Faker::create();
       foreach(range(1, 10) as $index)
       {
           User::create([
               'first_name' => $faker->firstname,
               'last_name' => $faker->lastname,
               'email' => $faker->email,
               'password' => $faker->password,
           ]);
       }
   }

}