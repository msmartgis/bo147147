<?php

use Illuminate\Database\Seeder;

use App\User;
use App\UserRole;
use App\Service;
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
        $admin_role = UserRole::where('role_name', 'admin')->first();
        $bureau_ordre = UserRole::where('role_name', 'bureau_ordre')->first();
        $president = UserRole::where('role_name', 'president')->first();
        $normal_service = UserRole::where('role_name', 'normal_service')->first();



        //president 
        $president_service = Service::where('ref', 'President')->first();
        $president_user = new User();
        $president_user->username = "president";
        $president_user->nom = "nom president";
        $president_user->prenom = "prenom president";
        $president_user->email = "president@gmail.com";
        $president_user->password = Hash::make('147147');
        $president_user->remember_token = str_random(60);
        $president_user->service_id = $president_service->id;
        $president_user->is_responsable = 1;
        $president_user->save();
        $president_user->role()->attach($president);




        //directeur gereral user
        $dg_service = Service::where('ref', 'DG')->first();
        $dg_user = new User();
        $dg_user->username = "jamaa";
        $dg_user->nom = "Lagutit";
        $dg_user->prenom = "Jamaa";
        $dg_user->email = "jamaa@gmail.com";
        $dg_user->password = Hash::make('147147');
        $dg_user->remember_token = str_random(60);
        $dg_user->service_id = $dg_service->id;
        $dg_user->is_responsable = 1;
        $dg_user->save();
        $dg_user->role()->attach($president);


        //bureau ordre
        $bo_service = Service::where('ref', 'B.O')->first();
        $bo_user = new User();
        $bo_user->username = "rachid";
        $bo_user->nom = "Danane";
        $bo_user->prenom = "Rachid";
        $bo_user->email = "rachid@gmail.com";
        $bo_user->password = Hash::make('147147');
        $bo_user->remember_token = str_random(60);
        $bo_user->service_id = $bo_service->id;
        $bo_user->is_responsable = 1;
        $bo_user->save();
        $bo_user->role()->attach($bureau_ordre);


        // service 1
        $normale_service_1 = Service::where('ref', 'المصلحة 1')->first();
        $bo_user = new User();
        $bo_user->username = "taoufik";
        $bo_user->nom = "Outaik";
        $bo_user->prenom = "Taoufik";
        $bo_user->email = "outaik@gmail.com";
        $bo_user->password = Hash::make('147147');
        $bo_user->remember_token = str_random(60);
        $bo_user->service_id = $normale_service_1->id;
        $bo_user->is_responsable = 1;
        $bo_user->save();
        $bo_user->role()->attach($normal_service);
    }
}
