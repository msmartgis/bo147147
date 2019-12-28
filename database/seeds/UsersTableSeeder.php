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
        // User::insert([
        //     'username' => 'med',
        //     'nom' => 'El hanine',
        //     'prenom' => 'Mohamed',
        //     'email' => 'medsmartgis@gmail.com',
        //     'password' => Hash::make('147147'),
        //     'role_id' => 1,
        //     'service_id' => '1501fa77-140c-4840-add8-fa410323143c'
        // ]);



        User::insert([
            'username' => 'b.o',
            'nom' => 'nom1',
            'prenom' => 'prenom1',
            'email' => 'email1@gmail.com',
            'password' => Hash::make('147147'),
            'role_id' => 2,
        ]);


        User::insert([
            'username' => 'president',
            'nom' => 'nom_president',
            'prenom' => 'prenom_president',
            'email' => 'email2@gmail.com',
            'password' => Hash::make('147147'),
            'role_id' => 3,
        ]);
    }
}
