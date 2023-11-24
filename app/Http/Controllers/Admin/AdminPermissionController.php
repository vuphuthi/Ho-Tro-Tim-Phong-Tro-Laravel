<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;

class AdminPermissionController extends Controller
{
    public function index(Request $request)
    {
        $permissions = Permission::whereRaw(1);

        $permissions = $permissions->orderByDesc('id')->paginate(20);

        $viewData = [
            'permissions' => $permissions,
            'query'       => $request->query()
        ];

        return view('admin.pages.permission.index', $viewData);
    }

    public function create()
    {
        $groups = config('permission.group');

        $viewData = [
            'groups' => $groups
        ];

        return view('admin.pages.permission.create', $viewData);
    }

    public function store(Request $request)
    {
        try {
            $data               = $request->except('_token');
            $data['guard_name'] = 'admins';
            $data['created_at'] = Carbon::now();

            Permission::create($data);

            return redirect()->route('get_admin.permission.index');
        } catch (\Exception $exception) {
            Log::error("---------------------  " . $exception->getMessage());
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $permission = Permission::find($id);
        $groups     = config('permission.group');
        $viewData   = [
            'permission' => $permission,
            'groups'     => $groups
        ];

        return view('admin.pages.permission.update', $viewData);
    }

    public function update($id, Request $request)
    {
        try {
            $data               = $request->except('_token');
            $data['guard_name'] = 'admins';
            $data['updated_at'] = Carbon::now();
            Permission::find($id)->update($data);

            return redirect()->route('get_admin.permission.index');
        } catch (\Exception $exception) {
            Log::error("---------------------  " . $exception->getMessage());
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        Permission::find($id)->delete();
        return redirect()->back();
    }
}
