<?php

use Illuminate\Database\Seeder;

class TestimonySeeder extends Seeder
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
            

            DB::table('testimonies')->insert([
                'church_id' => $faker->numberBetween($min = 1, $max = 6),
                'category_id' => $faker->numberBetween($min = 1, $max = 6),
                'user_id' => $faker->numberBetween($min = 1, $max = 100),
                'subject' => $faker->realText,
                'testimony' => $faker->text,
                'contact' => $faker->phoneNumber,
                'happen_to' => $faker->jobTitle,
            ]);

            
        }

        
    }
}
