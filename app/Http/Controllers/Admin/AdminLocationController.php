<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Category;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AdminLocationController extends Controller
{
    public function index(Request $request)
    {
        $rooms = Room::with('category:id,name,slug', 'city:id,name,slug', 'district:id,name,slug', 'wards:id,name,slug', 'roomOptionItem');
        if ($request->category_id)
            $rooms->where('category_id', $request->category_id);

        if ($request->city_id)
            $rooms->where('city_id', $request->city_id);

        if ($request->price)
            $rooms->where('price', $request->price);

        if ($request->option_items) {
            foreach ($request->option_items as $option_item) {
                $rooms->whereHas('roomOptionItem', function ($query) use ($option_item) {
                    $query->where('room_option_item.option_item_id', $option_item);
                });
            }
        }

        if ($request->area)
            $rooms->where('area', $request->area);

        if ($request->n)
            $rooms->where('name', 'like', '%' . $request->n . '%');

        $rooms->when($request->get('category_id'), function ($q) use ($request) {
            $q->where('category_id', $request->get('category_id'));
        })
            ->when($request->get('price'), function ($q) use ($request) {
                $q->where('price', $request->get('price'));
            })
            ->when($request->get('area'), function ($q) use ($request) {
                $q->where('area', $request->get('area'));
            });

        $rooms = $rooms->orderByDesc('id')->paginate(10);
        $categories = Category::select('id', 'name')->get();

        $showMap = [];
        foreach ($rooms as $room) {
            $showMap[] = [
                'name' => $room->description,
                'category_name' => $room->category->name,
                'y' => $room->y,
                'x' => $room->x,
                'category_id' => $room->category_id,
                'id' => $room->id,
            ];
        }

        return view('admin.pages.location.index')->with(['rooms' => $rooms, 'categories' => $categories, 'showMap' => $showMap]);
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
            $data = $request->except('_token', 'avatar');
            $data['slug'] = Str::slug($request->name);
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
        $cities = Location::get();
        $viewData = [
            'location' => $location,
            'cities' => $cities
        ];

        return view('admin.pages.location.update', $viewData);
    }

    public function update($id, Request $request)
    {
        try {
            $data = $request->except('_token', 'avatar');
            $data['slug'] = Str::slug($request->name);
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

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $query = Room::select('id', 'name', 'x', 'y', 'category_id')
                ->when($request->get('category_id'), function ($q) use ($request) {
                    $q->where('category_id', $request->get('category_id'));
                })
                ->when($request->get('price'), function ($q) use ($request) {
                    $q->where('price', $request->get('price'));
                })
                ->when($request->get('area'), function ($q) use ($request) {
                    $q->where('area', $request->get('area'));
                })->get();

            $showMap = [];
            foreach ($query as $room) {
                $showMap[] = [
                    'name' => $room->description,
                    'y' => $room->y,
                    'x' => $room->x,
                    'category_id' => $room->category_id,
                ];
            }

            return response()->json($showMap);
        }
    }
}
