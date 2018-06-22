<?php

use Illuminate\Database\Seeder;

class UsersPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_permissions')->insert([
            [
                'name' => 1,
                'permission' => 'Member',
                'default_page' => 'dashboard'
            ],
            [
                'name' => 2,
                'permission' => 'Church Admin',
                'default_page' => 'admin'
            ],
            [
                'name' => 3,
                'permission' => 'Super Admin',
                'default_page' => 'mandate'
            ],

        ]);
    }
}
