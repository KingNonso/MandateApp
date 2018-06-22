<?php

use Illuminate\Database\Seeder;

class AnnouncementSeeder extends Seeder
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


            DB::table('announcements')->insert([
                'church_id' => $faker->numberBetween($min = 1, $max = 5),
                'user_id' => $faker->numberBetween($min = 1, $max = 50),
                'subject' => $faker->realText,
                'body' => $faker->realText.' '.$faker->text,
            ]);


        }
    }
}
