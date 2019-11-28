<?php

use Illuminate\Database\Seeder;

use App\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'username' => 'med',
            'nom' => 'El hanine',
            'prenom' => 'Mohamed',
            'email' => 'medsmartgis@gmail.com',
            'password' => Hash::make('147147'),
            'role_id' => 1,
            'service_id' => '1501fa77-140c-4840-add8-fa410323143c'
        ]);
    }
}
