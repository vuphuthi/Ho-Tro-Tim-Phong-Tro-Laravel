<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AdminLocationController extends Controller
{
    public function index(Request $request)
    {
        $locations = Location::whereRaw(1);

        if ($request->n)
            $locations->where('name', 'like', '%' . $request->n . '%');

        $locations = $locations->orderByDesc('id')->paginate(40);

        $viewData = [
            'locations' => $locations,
            'query'     => $request->query()
        ];

        return view('admin.pages.location.index', $viewData);
    }

    public function create()
    {
        $cities = Location::get();

        $viewData = [
            'cities' => $cities
        ];

        return view('admin.pages.location.create', $viewData);
    }

    public function store(Request $request)
    {
        try {
            $data               = $request->except('_token', 'avatar');
            $data['slug']       = Str::slug($request->name);
            $data['created_at'] = Carbon::now();
            if ($request->avatar) {
                $file = upload_image('avatar');
                if (isset($file) && $file['code'] == 1) {
                    $data['avatar'] = $file['name'];
                }
            }
            $location = Location::create($data);

            return redirect()->route('get_admin.location.index');
        } catch (\Exception $exception) {
            Log::error("---------------------  " . $exception->getMessage());
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $location = Location::find($id);
        $cities   = Location::get();
        $viewData = [
            'location' => $location,
            'cities'   => $cities
        ];

        return view('admin.pages.location.update', $viewData);
    }

    public function update($id, Request $request)
    {
        try {
            $data               = $request->except('_token', 'avatar');
            $data['slug']       = Str::slug($request->name);
            $data['updated_at'] = Carbon::now();

            if ($request->avatar) {
                $file = upload_image('avatar');
                if (isset($file) && $file['code'] == 1) {
                    $data['avatar'] = $file['name'];
                }
            }

            Location::find($id)->update($data);

            return redirect()->route('get_admin.location.index');
        } catch (\Exception $exception) {
            Log::error("---------------------  " . $exception->getMessage());
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        Location::find($id)->delete();
        return redirect()->back();
    }
}
