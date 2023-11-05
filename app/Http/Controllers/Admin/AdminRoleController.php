<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminRoleController extends Controller
{
    public function index(Request $request)
    {
        $roles = Role::whereRaw(1);

        $roles = $roles->orderByDesc('id')->paginate(20);

        $viewData = [
            'roles' => $roles,
            'query' => $request->query()
        ];

        return view('admin.pages.role.index', $viewData);
    }

    public function create()
    {
        $permissions = Permission::all();
        $viewData    = [
            'permissions'      => $permissions,
            'permissionActive' => []
        ];

        return view('admin.pages.role.create', $viewData);
    }

    public function store(Request $request)
    {
        try {
            $data               = $request->except('_token', 'permissions');
            $data['guard_name'] = 'admins';
            $data['created_at'] = Carbon::now();

            $role = Role::create($data);
            if ($role && !empty($request->permissions))
                $role->givePermissionTo($request->permissions);

            return redirect()->route('get_admin.role.index');
        } catch (\Exception $exception) {
            Log::error("---------------------  " . $exception->getMessage());
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $role = Role::find($id);

        $permissions = Permission::all();

        $permissionActive = DB::table('role_has_permissions')->where('role_id', $id)->pluck('permission_id')->toArray();
        $viewData         = [
            'role'             => $role,
            'permissions'      => $permissions,
            'permissionActive' => $permissionActive
        ];

        return view('admin.pages.role.update', $viewData);
    }

    public function update($id, Request $request)
    {
        try {
            $data               = $request->except('_token','permissions');
            $data['guard_name'] = 'admins';
            $data['updated_at'] = Carbon::now();
            Role::find($id)->update($data);

            $role = Role::find($id);
            if ($role && !empty($request->permissions))
            {
                $permissionActive = DB::table('role_has_permissions')->where('role_id', $id)->pluck('permission_id')->toArray();
                if ($permissionActive) {
                    foreach ($permissionActive as $item)
                        $role->revokePermissionTo($item);
                }
                $role->givePermissionTo($request->permissions);
            }

            return redirect()->route('get_admin.role.index');
        } catch (\Exception $exception) {
            Log::error("---------------------  " . $exception->getMessage());
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        Role::find($id)->delete();
        return redirect()->back();
    }
}
