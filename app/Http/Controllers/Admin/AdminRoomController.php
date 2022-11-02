<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AdminRoomController extends Controller
{
    public function index(Request $request)
    {
        $rooms = Room::with('category:id,name')->orderByDesc('id')->paginate(20);
        $viewData   = [
            'rooms' => $rooms
        ];

        return view('admin.pages.room.index', $viewData);
    }

    public function create()
    {
        $viewData = [

        ];

        return view('admin.pages.category.create', $viewData);
    }

    public function success($id)
    {
        $room = Room::find($id);
        $room->status = Room::STATUS_ACTIVE;
        $room->save();

        return redirect()->back();
    }

    public function expires($id)
    {
        $room = Room::find($id);
        $room->status = Room::STATUS_EXPIRED;
        $room->time_stop = date('Y-m-d');
        $room->save();

        return redirect()->back();
    }

    public function hide($id)
    {
        $room = Room::find($id);
        $room->status = Room::STATUS_DEFAULT;
        $room->save();

        return redirect()->back();
    }

    public function cancel($id)
    {
        $room = Room::find($id);
        $viewData = [
            'room' => $room
        ];

        return view('admin.pages.room.cancel', $viewData);
    }

    public function processCancelRoom($id, Request  $request)
    {
        try {
            $room = Room::find($id);
            $room->reason = $request->reason;
            $room->status = -1;
            $room->save();
            return redirect()->route('get_admin.room.index');
        } catch (\Exception $exception) {
            Log::error("---------------------  " . $exception->getMessage());
            return redirect()->back();
        }
    }

    public function store(Request $request)
    {
        try {
            $data               = $request->except('_token');
            $data['slug']       = Str::slug($request->name);
            $data['created_at'] = Carbon::now();
            Category::create($data);

            return redirect()->route('get_admin.category.index');
        } catch (\Exception $exception) {
            Log::error("---------------------  " . $exception->getMessage());
            return redirect()->back();
        }
    }

    public function update($id, Request $request)
    {
        try {
            $data               = $request->except('_token');
            $data['slug']       = Str::slug($request->name);
            $data['updated_at'] = Carbon::now();
            Category::find($id)->update($data);

            return redirect()->route('get_admin.category.index');
        } catch (\Exception $exception) {
            Log::error("---------------------  " . $exception->getMessage());
            return redirect()->back();
        }
    }
}
