<?php

namespace App\Http\Controllers;

use App\Service;
use App\User;
use App\ModeReception;
use App\CategorieCourrier;
use Illuminate\Http\Request;
use DataTables;

class ParametresController extends Controller
{

    public function getModelData(Request $request)
    {
        if($request->model == "service")
        {            
            $service = Service::find($request->id);
            $service_responsable = Service::find($request->id)->responsables;
            return response()->json(collect([
                'service'=> $service,
                'responsable'=>$service_responsable
            ])->toJson()
        );
        }        
    }

    public function index()
    {
        $services = Service::all();
        $responsables = User::where('is_responsable',0)->pluck('username', 'id');
        
        return view('parametres.index')->with([
            'services' => $services,
            'responsables' => $responsables,
        ]);
    }




    public function getUsers(Request $request)
    {
        $users = User::orderBy('nom');
        if ($request->ajax()) {
            $datatables = DataTables::eloquent($users)

                // ->addColumn('service', function (User $user) {
                //     return $user->service->nom;
                // })


                ->addColumn('actions', function ($users) {
                    return '<button class="edit-setting-btn" style="background: none;border: none;" data-id="user_' . $users->id . '"><i class="fa fa-edit "  style="margin-right: 5px;color: #219009"></i></button><button class="delete-setting-btn" style="background: none;border: none;" data-id="user_' . $users->id . '"><i class="fa fa-trash "  style="color: #ff1308"></i>';
                })

                ->addColumn('service', function (User $user) {
                    if ($user->service != null) {
                        return $user->service->nom;
                    }
                    
                })
                ->rawColumns(['actions']);;
        }
        return $datatables->make(true);
    }

 
    public function getModesReceptions(Request $request)
    {
        $mode_receptions = ModeReception::orderBy('created_at');
        if ($request->ajax()) {
            $datatables = DataTables::eloquent($mode_receptions)

                // ->addColumn('service', function (User $user) {
                //     return $user->service->nom;
                // })


                ->addColumn('actions', function ($mode_receptions) {
                    return '<button class="edit-mode-reception-btn" style="background: none;border: none;" id="modeReceptionEditBtn_' . $mode_receptions->id . '"><i class="fa fa-edit "  style="margin-right: 5px;color: #219009"></i></button><button class="delete-mode-reception-btn" style="background: none;border: none;" id="modeReceptionDeleteBtn_' . $mode_receptions->id . '"><i class="fa fa-trash "  style="color: #ff1308"></i>';
                })

             
                ->rawColumns(['actions']);
        }
        
        return $datatables->make(true);
    }

    public function getServices(Request $request)
    {
        $services = Service::orderBy('created_at');
        if ($request->ajax()) {
            $datatables = DataTables::eloquent($services)

                // ->addColumn('service', function (User $user) {
                //     return $user->service->nom;
                // })


                ->addColumn('actions', function ($services) {
                    return '<button class="edit-setting-btn" style="background: none;border: none;" data-id="service_' . $services->id . '"> <i class="fa fa-edit "  style="margin-right: 5px;color: #219009"></i></button><button class="delete-user-btn" style="background: none;border: none;" id="userDeleteBtn_' . $services->id . '"><i class="fa fa-trash "  style="color: #ff1308"></i>';
                })

             
                ->rawColumns(['actions']);

        }
        return $datatables->make(true);

    }

    public function getCategories(Request $request)
    {

        $categories = CategorieCourrier::orderBy('created_at');
        if ($request->ajax()) {
            $datatables = DataTables::eloquent($categories)

                // ->addColumn('service', function (User $user) {
                //     return $user->service->nom;
                // })


                ->addColumn('actions', function ($categories) {
                    return '<button class="edit-user-btn" style="background: none;border: none;" id="userEditBtn_' . $categories->id . '"><i class="fa fa-edit "  style="margin-right: 5px;color: #219009"></i></button><button class="delete-user-btn" style="background: none;border: none;" id="userDeleteBtn_' . $categories->id . '"><i class="fa fa-trash "  style="color: #ff1308"></i>';
                })

             
                ->rawColumns(['actions']);
        }
        
        return $datatables->make(true);

    }
}
