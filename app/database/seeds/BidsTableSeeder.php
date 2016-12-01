<?php

use Faker\Factory as Faker;

class BidsTableSeeder extends Seeder {

   public function run()
   {
       DB::table('bids')->truncate();
       $faker = Faker::create();
       $users = User::all()->lists('id');
       $deals = Deal::all()->lists('id');
       foreach(range(1, 10) as $index)
       {
           Bid::create([
               'user_id' => $faker->randomElement($users),
               'deal_id' => $faker->randomElement($deals),
               'price' => $faker->numberBetween(2, 5, 100),
               'accepted' => $faker->numberBetween(0, 1),
           ]);
       }
   }

}