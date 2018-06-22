<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(CountryStateSeeder::class);
        //$this->call(CountryStateCitySeeder::class);
        //$this->call(ChurchTableSeeder::class);
        //$this->call(UsersPermissionsTableSeeder::class);
        //$this->call(TestimonyCategories::class);
        //$this->call(UserSeeder::class);
        $this->call(TestimonySeeder::class);
        //$this->call(AnnouncementSeeder::class);
    }
}
