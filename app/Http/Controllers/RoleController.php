<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Repositories\RoleRepository;
use App\Models\PermissionRole;

class RoleController extends Controller
{
    protected $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function index(){

        return view('backend.manage_role');
    }

    public function getList(){
        $role = $this->roleRepository->getAll();

        return Datatables::of($role)
        ->addIndexColumn()
        ->editColumn('permission', function($role) {

            return $role->permissions;
        })        
        ->editColumn('created_at', function($role) {

            return $role->created_at->format('Y-m-d');
        })
        ->rawColumns(['permission'])
        ->make(true);
    }

    public function addpermisson(Request $request){
        $row = PermissionRole::where('role_id', $request->role_id)->where('permission_id', $request->permission_id)->first();
        if (isset($row)){

            return response()->json([
                'error' => true,
                'message' => __('trans.Add permission error'),
            ]);
        } else {
            $permission = PermissionRole::create($request->all());

            return response()->json([
                'error' => false,
                'message' => __('trans.Add permission success'),
            ]);
        }
    }
}
