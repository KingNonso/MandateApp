<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for($i=0; $i<=500; $i++){
            DB::table('users')->insert([
                'country_id' => $faker->numberBetween($min = 1, $max = 50),
                'state_id' => $faker->numberBetween($min = 1, $max = 4119),
                'city_id' => $faker->numberBetween($min = 1, $max = 48000),
                'church_id' => $faker->numberBetween($min = 1, $max = 50),
                'firstname' => $faker->firstName,
                'surname' => $faker->lastName,
                'email' => $faker->freeEmail,
                'password' => bcrypt('secret'),
                'phone' => $faker->phoneNumber,
                'address' => $faker->address,
            ]);

            

            
        }

        
    }
}
