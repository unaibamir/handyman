<?php

use App\Client;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i = 0; $i < 15; $i++) {
            Client::create([
                'username' => $faker->userName,
                'email' => $faker->email,
                'password' => bcrypt('client'),
                'fname' => $faker->firstName(),
                'lname' => $faker->lastName,
                'latitude'  =>  $faker->latitude,
                'longitude' =>  $faker->longitude,
                'user_image' => 'clients/images/default.jpg',
                'bio'       =>  $faker->text,
                'state'     =>  $faker->state,
                'country'   =>  $faker->country,
                'zipcode'   =>  $faker->postcode,
                'is_active'   => $faker->boolean(50),
                'is_approved'   =>  $faker->boolean(50),
            ]);
        }
    }
}
