<?php

use Illuminate\Database\Seeder;

class ChurchTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for($i=0; $i<=100; $i++){
            DB::table('churches')->insert([
                'country_id' => $faker->numberBetween($min = 1, $max = 245),
                'state_id' => $faker->numberBetween($min = 1, $max = 4119),
                'city_id' => $faker->numberBetween($min = 1, $max = 48590),
                'province' => $faker->text,
                'area' => $faker->name,
                'district' => $i,
                'church_name' => $faker->company,
                'address' => $faker->address,
                'geolocation' => $faker->realText,
            ]);
        }

        
    }
}
