<?php

use Illuminate\Database\Seeder;
use App\UserRole;

class UsersRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserRole::insert([
            'role_name' => 'admin',
        ]);

        UserRole::insert([
            'role_name' => 'bureau_ordre',
        ]);

        UserRole::insert([
            'role_name' => 'president',
        ]);
    }
}
