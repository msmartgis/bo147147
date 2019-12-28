<?php

namespace App\Http\Controllers;

use App\Service;
use App\User;
use Illuminate\Http\Request;
use DataTables;

class ParametresController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('parametres.index')->with([
            'services' => $services
        ]);
    }


    public function getUsers(Request $request)
    {
        $users = User::with('service')->orderBy('role_id');
        if ($request->ajax()) {
            $datatables = DataTables::eloquent($users)

                // ->addColumn('service', function (User $user) {
                //     return $user->service->nom;
                // })


                ->addColumn('actions', function ($users) {
                    return '<button class="edit-user-btn" style="background: none;border: none;" id="userEditBtn_' . $users->id . '"><i class="fa fa-edit "  style="margin-right: 5px;color: #219009"></i></button><button class="delete-user-btn" style="background: none;border: none;" id="userDeleteBtn_' . $users->id . '"><i class="fa fa-trash "  style="color: #ff1308"></i>';
                })
                ->rawColumns(['actions']);;
        }
        return $datatables->make(true);
    }
}
