<?php

use Illuminate\Database\Seeder;

class TestimonyCategories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('testimonies_category')->insert([
            [
                'name' => 'General',
                'description' => 'General'
            ],
            [
                'name' => 'Health & Healing',
                'description' => 'Health & Healing'
            ],
            [
                'name' => 'Marital Bliss',
                'description' => ''
            ],
            [
                'name' => 'Academic Success',
                'description' => ''
            ],
            [
                'name' => 'Miracle Job & Promotion',
                'description' => 'Miracle Job & Promotion'
            ],
            [
                'name' => 'Business/ Financial Breakthrough',
                'description' => 'Business/ Financial Breakthrough'
            ],

        ]);
    }
}
