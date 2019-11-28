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
    }
}
