<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminAccountController extends Controller
{
    public function index(Request $request)
    {
        $admins = Admin::whereRaw(1);

        if ($request->n)
            $admins->where('name', 'like', '%' . $request->n . '%');

        $admins = $admins->orderByDesc('id')->paginate(20);

        $viewData = [
            'admins' => $admins,
            'query'  => $request->query()
        ];

        return view('admin.pages.account.index', $viewData);
    }

    public function create()
    {
        $roles    = Role::all();
        $viewData = [
            'roles'      => $roles,
            'roleActive' => []
        ];

        return view('admin.pages.account.create', $viewData);
    }

    public function store(Request $request)
    {
        try {
            $data               = $request->except('_token', 'roles','avatar');
            $data['created_at'] = Carbon::now();
            $data['password']   = bcrypt($request->password);

            if ($request->avatar) {
                $file = upload_image('avatar');
                if (isset($file) && $file['code'] == 1) {
                    $data['avatar'] = $file['name'];
                }
            }

            $account            = Admin::create($data);
            if ($account && $request->roles)
                $account->assignRole($request->roles);

            return redirect()->route('get_admin.account.index');
        } catch (\Exception $exception) {
            Log::error("---------------------  " . $exception->getMessage());
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $admin = Admin::find($id);
        $roles = Role::all();

        $roleActive = DB::table('model_has_roles')->where('model_id', $id)->pluck('role_id')->toArray();

        $viewData = [
            'admin'      => $admin,
            'roles'      => $roles,
            'roleActive' => $roleActive
        ];

        return view('admin.pages.account.update', $viewData);
    }

    public function update($id, Request $request)
    {
        try {
            $data               = $request->except('_token', 'roles', 'password');
            $data['updated_at'] = Carbon::now();

            if ($request->password)
                $data['password'] = bcrypt($request->password);

            if ($request->avatar) {
                $file = upload_image('avatar');
                if (isset($file) && $file['code'] == 1) {
                    $data['avatar'] = $file['name'];
                }
            }

            Admin::find($id)->update($data);
            $account = Admin::find($id);
            if ($account && $request->roles)
            {
                $roleActive = DB::table('model_has_roles')->where('model_id', $id)->pluck('role_id')->toArray();
                if (!empty($roleActive))
                {
                    foreach ($roleActive as $item)
                        $account->removeRole($item);
                }

                $account->assignRole($request->roles);
            }

            return redirect()->route('get_admin.account.index');
        } catch (\Exception $exception) {
            Log::error("---------------------  " . $exception->getMessage());
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        Admin::find($id)->delete();
        return redirect()->back();
    }
}
