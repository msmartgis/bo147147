<?php

use Illuminate\Database\Seeder;

use App\User;
use App\UserRole;
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
        $admin_tole = UserRole::where('role_name', 'admin')->first();
        $bureau_ordre = UserRole::where('role_name', 'bureau_ordre')->first();
        $president = UserRole::where('role_name', 'president')->first();

        //admin med
        $admin = new User();
        $admin->username = "med";
        $admin->nom = "El hanine";
        $admin->prenom = "Mohamed";
        $admin->email = "emailuser@gmail.com";
        $admin->password = Hash::make('147147');
        $admin->remember_token = str_random(60);
        $admin->save();

        $admin->role()->attach($admin_tole);

        //bureau ordre user
        $bureau_ordre_user = new User();
        $bureau_ordre_user->username = "bureau ordre";
        $bureau_ordre_user->nom = "Chawki";
        $bureau_ordre_user->prenom = "Mohamed";
        $bureau_ordre_user->email = "emailuser@gmail.com";
        $bureau_ordre_user->password = Hash::make('147147');
        $bureau_ordre_user->remember_token = str_random(60);
        $bureau_ordre_user->save();

        $bureau_ordre_user->role()->attach($bureau_ordre);


        //president user
        $president_user = new User();
        $president_user->username = "president";
        $president_user->nom = "presdent nom";
        $president_user->prenom = "president prenom";
        $president_user->email = "emailuser@gmail.com";
        $president_user->password = Hash::make('147147');
        $president_user->remember_token = str_random(60);
        $president_user->save();

        $president_user->role()->attach($president);


        // User::insert([
        //     'username' => 'b.o',
        //     'nom' => 'nom1',
        //     'prenom' => 'prenom1',
        //     'email' => 'email1@gmail.com',
        //     'password' => Hash::make('147147'),
        //     'role_id' => 2,
        // ]);


        // User::insert([
        //     'username' => 'president',
        //     'nom' => 'nom_president',
        //     'prenom' => 'prenom_president',
        //     'email' => 'email2@gmail.com',
        //     'password' => Hash::make('147147'),
        //     'role_id' => 3,
        // ]);


        // User::insert([
        //     'username' => 'med',
        //     'nom' => 'El hanine',
        //     'prenom' => 'Mohamed',
        //     'email' => 'medsmartgis@gmail.com',
        //     'password' => Hash::make('147147'),
        //     'role_id' => 1,
        //     'service_id' => '1501fa77-140c-4840-add8-fa410323143c'
        // ]);
    }
}
