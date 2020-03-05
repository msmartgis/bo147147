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

        $admin = new UserRole();
        $admin->role_name = "admin";
        $admin->desciption = "admin gere tous les autres utlisateurs et il a toutes les permissions";
        $admin->save();

        $bureau_ordre = new UserRole();
        $bureau_ordre->role_name = "bureau_ordre";
        $bureau_ordre->desciption = "pour les utilisateur de bureau d ordre";
        $bureau_ordre->save();

        $president = new UserRole();
        $president->role_name = "president";
        $president->desciption = "pour le president et le directeur general";
        $president->save();


        $normal_service = new UserRole();
        $normal_service->role_name = "normal_service";
        $normal_service->desciption = "pour les autres services";
        $normal_service->save();



        // UserRole::insert([
        //     'role_name' => 'admin',
        // ]);

        // UserRole::insert([
        //     'role_name' => 'bureau_ordre',
        // ]);

        // UserRole::insert([
        //     'role_name' => 'president',
        // ]);
    }
}
