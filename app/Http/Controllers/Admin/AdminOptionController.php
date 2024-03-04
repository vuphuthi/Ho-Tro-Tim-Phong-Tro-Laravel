<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\OptionItems;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;

class AdminOptionController extends Controller
{
    public function index(Request $request)
    {
        $admins = OptionItems::whereRaw(1);

        if ($request->n)
            $admins->where('name', 'like', '%' . $request->n . '%');

        $admins = $admins->orderByDesc('id')->paginate(20);

        $viewData = [
            'admins' => $admins,
            'query' => $request->query()
        ];

        return view('admin.pages.option.index', $viewData);
    }

    public function create()
    {
        return view('admin.pages.option.create');
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            OptionItems::create($request->all());

            DB::commit();

            return redirect()->route('get_admin.option.index');
        } catch (\Exception $exception) {
            DB::rollBack();

            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $optionItem = OptionItems::find($id);

        $viewData = [
            'option_item' => $optionItem,
        ];

        return view('admin.pages.option.update', $viewData);
    }

    public function update($id, Request $request)
    {
        try {
            DB::beginTransaction();

            OptionItems::find($id)->update($request->all());

            DB::commit();

            return redirect()->route('get_admin.option.index');
        } catch (\Exception $exception) {
            DB::rollBack();

            return redirect()->back();
        }
    }

    public function delete($id)
    {
        try {
            DB::beginTransaction();

            OptionItems::find($id)->delete();

            DB::commit();

            return redirect()->route('get_admin.option.index');
        } catch (\Exception $exception) {
            DB::rollBack();

            return redirect()->back();
        }
    }
}
