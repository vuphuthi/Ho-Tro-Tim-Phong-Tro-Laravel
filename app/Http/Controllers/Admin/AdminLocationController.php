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
    public function index()
    {
        $locations = Location::orderByDesc('id')->paginate(20);

        $viewData = [
            'locations' => $locations
        ];

        return view('admin.pages.location.index', $viewData);
    }

    public function create()
    {
        $cities = Location::where('parent_id', 0)->get();

        $viewData = [
            'cities' => $cities
        ];

        return view('admin.pages.location.create', $viewData);
    }

    public function store(Request $request)
    {
        try {
            $data               = $request->except('_token','avatar');
            $data['slug']       = Str::slug($request->name);
            $data['created_at'] = Carbon::now();
            if ($request->avatar) {
                $file = upload_image('avatar');
                if (isset($file) && $file['code'] == 1) {
                    $data['avatar'] = $file['name'];
                }
            }
            $location           = Location::create($data);

            return redirect()->route('get_admin.location.index');
        } catch (\Exception $exception) {
            Log::error("---------------------  " . $exception->getMessage());
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $location = Location::find($id);
        $cities   = Location::where('parent_id', 0)->get();
        $viewData = [
            'location' => $location,
            'cities'   => $cities
        ];

        return view('admin.pages.location.update', $viewData);
    }

    public function update($id, Request $request)
    {
        try {
            $data               = $request->except('_token','avatar');
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
}
