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
        $this->call([
            UsersRolesTableSeeder::class,
            ServicesTableSeeder::class,
            UsersTableSeeder::class,
            ModesReceptionsTableSeeder::class,
        ]);
    }
}
