<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRoomRequest;
use App\Models\Category;
use App\Models\Location;
use App\Models\PaymentHistory;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class UserRoomController extends Controller
{
    public function index(Request $request)
    {
        $rooms = Room::with('category:id,name,slug', 'city:id,name,slug', 'district:id,name,slug', 'wards:id,name,slug', 'paymentHistory:id,room_id')
            ->where("auth_id", \Auth::user()->id);

        $rooms = $rooms->orderByDesc("id")->paginate(20);

        $viewData = [
            'rooms' => $rooms
        ];

        return view('user.room.index', $viewData);
    }

    public function create(Request $request)
    {
        $cities     = Location::select('id', 'name')->where('type', 1)->get();
        $districts  = Location::select('id', 'name')->where('type', 2)->get();
        $wards      = Location::select('id', 'name')->where('type', 3)->get();
        $categories = Category::select('id', 'name')->get();

        $viewData = [
            'cities'     => $cities,
            'districts'  => $districts,
            'wards'      => $wards,
            'categories' => $categories
        ];

        return view('user.room.create', $viewData);
    }

    public function store(UserRoomRequest $request)
    {
        $data               = $request->except('_token', 'avatar', 'file');
        $data['created_at'] = Carbon::now();
        $data['status']     = Room::STATUS_EXPIRED;
        $data['slug']       = Str::slug($request->name);
        $data['auth_id']    = \Auth::user()->id;
        if ($request->avatar) {
            $file = upload_image('avatar');
            if (isset($file) && $file['code'] == 1) {
                $data['avatar'] = $file['name'];
            }
        }

        $data = $this->switchPrice($data);
        $data = $this->switchArea($data);

        $room = Room::create($data);
        if ($room) {
            if ($request->file) {
                $this->syncAlbumImageAndProduct($request->file, $room->id);
            }
            return redirect()->route('get_user.room.index');
        }

        return redirect()->back();
    }

    public function edit($id, Request $request)
    {
        $room = Room::where([
            'id'      => $id,
            'auth_id' => \Auth::user()->id
        ])->first();

        if (!$room) return abort(404);

        $cities     = Location::select('id', 'name')->where('type', 1)->get();
        $districts  = Location::select('id', 'name')->where('type', 2)->get();
        $wards      = Location::select('id', 'name')->where('type', 3)->get();
        $categories = Category::select('id', 'name')->get();
        $images     = \DB::table('images')
            ->where("room_id", $id)
            ->get();

        $viewData = [
            'cities'     => $cities,
            'districts'  => $districts,
            'wards'      => $wards,
            'images'     => $images,
            'categories' => $categories,
            'room'       => $room
        ];


        return view('user.room.update', $viewData);
    }

    public function update($id, UserRoomRequest $request)
    {
        $data               = $request->except('_token', 'avatar', 'file');
        $data['updated_at'] = Carbon::now();
        $data['price']      = str_replace('.', '', $request->price);
        $data['slug']       = Str::slug($request->name);

        if ($request->avatar) {
            $file = upload_image('avatar');
            if (isset($file) && $file['code'] == 1) {
                $data['avatar'] = $file['name'];
            }
        }

        //area
        $data = $this->switchPrice($data);
        $data = $this->switchArea($data);
        //price

        //
        $room = Room::where([
            'id'      => $id,
            'auth_id' => \Auth::user()->id
        ])->update($data);

        if ($room) {
            if ($request->file) {
                $this->syncAlbumImageAndProduct($request->file, $id);
            }
            return redirect()->route('get_user.room.index');
        }

        return redirect()->back();
    }

    protected function switchPrice($data)
    {
        switch ($data['price']) {
            case $data['price'] < 1000000:
                $data['range_price'] = 1;
                break;

            case ($data['price'] >= 1000000 && $data['price'] < 2000000):
                $data['range_price'] = 2;
                break;

            case ($data['price'] >= 2000000 && $data['price'] < 3000000):
                $data['range_price'] = 3;
                break;

            case ($data['price'] >= 3000000 && $data['price'] < 5000000):
                $data['range_price'] = 4;
                break;

            case ($data['price'] >= 5000000 && $data['price'] < 7000000):
                $data['range_price'] = 5;
                break;

            case ($data['price'] >= 7000000 && $data['price'] < 10000000):
                $data['range_price'] = 6;
                break;

            case ($data['price'] >= 10000000 && $data['price'] < 15000000):
                $data['range_price'] = 7;
                break;

            case ($data['price'] >= 15000000):
                $data['range_price'] = 8;
                break;
        }

        return $data;
    }

    protected function switchArea($data)
    {
        switch ($data['area']) {
            case $data['area'] < 20:
                $data['range_area'] = 1;
                break;

            case ($data['area'] >= 20 && $data['area'] < 30):
                $data['range_area'] = 2;
                break;

            case ($data['area'] >= 30 && $data['area'] < 50):
                $data['range_area'] = 3;
                break;

            case ($data['area'] >= 50 && $data['area'] < 60):
                $data['range_area'] = 4;
                break;

            case ($data['area'] >= 60 && $data['area'] < 70):
                $data['range_area'] = 5;
                break;

            case ($data['area'] >= 70 && $data['area'] < 80):
                $data['range_area'] = 6;
                break;

            case ($data['area'] >= 80 && $data['area'] < 100):
                $data['range_area'] = 7;
                break;

            case ($data['area'] >= 100 && $data['area'] < 120):
                $data['range_area'] = 8;
                break;

            case ($data['area'] >= 120 && $data['area'] < 150):
                $data['range_area'] = 9;
                break;

            case ($data['area'] >= 150):
                $data['range_area'] = 10;
                break;
        }

        return $data;
    }

    public function payRoom($id)
    {
        $room = Room::where([
            'id'      => $id,
            'auth_id' => \Auth::user()->id,
            'status'  => Room::STATUS_EXPIRED
        ])->first();

        $viewData = [
            'room' => $room
        ];

        return view('user.room.pay', $viewData);
    }

    public function savePayRoom($id, Request $request)
    {
        $room            = Room::find($id);
        $data            = $request->all();
        $roomType        = $request->room_type;
        $configPriceType = config('payment.type_price');
        $price           = $configPriceType[$roomType];
        $day             = $request->day;

        // Tổng tiền
        $totalMoney = $day * $price;

        //
        $account_balance = get_data_user('web', 'account_balance');
        if ($account_balance < $totalMoney) {
            // show message số dư ko đủ
            return redirect()->back();
        }

        try {
            DB::beginTransaction();
            // lưu vào payment history
            PaymentHistory::create([
                'user_id'    => get_data_user('web'),
                'room_id'    => $id,
                'money'      => $totalMoney,
                'type'       => $roomType,
                'service_id' => 0,
                'status'     => PaymentHistory::STATUS_SUCCESS,
                'created_at' => Carbon::now()
            ]);
            // Trừ tiền

            DB::table('users')->where('id', get_data_user('web'))
                ->decrement('account_balance', $totalMoney);

            $timeStartNow = Carbon::parse($request->time_start);
            $timeStop     = $timeStartNow->addDay($request->day);
            // Update tin
            $room->status      = Room::STATUS_PAID;
            $room->time_start  = $request->time_start;
            $room->time_stop   = $timeStop->format('Y-m-d');
            $room->service_hot = $roomType;
            $room->updated_at  = Carbon::now();
            $room->save();
            DB::commit();

            return redirect()->route('get_user.room.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error("---------------------  " . $exception->getMessage());
            return redirect()->back();
        }
    }

    public function loadDistrict(Request $request)
    {
        if ($request->ajax()) {
            $city      = $request->city_id;
            $locations = Location::where('parent_id', $city)->select('id', 'name', 'slug')->get();

            return response()->json($locations);
        }
    }


    public function hideRoom($id)
    {
        $room         = Room::find($id);
        $room->status = Room::STATUS_DEFAULT;
        $room->save();

        return redirect()->back();
    }

    public function activeRoom($id)
    {
        $today         = Date::today()->format('Y-m-d');
        $checkTimeRoom = Room::with('category:id,name,slug', 'city:id,name,slug')
            ->whereDate('time_start', '<=', $today)
            ->whereDate('time_stop', '>=', $today)
            ->find($id);

        if (!$checkTimeRoom) {
            // Update status của room
            DB::table('rooms')->where('id', $id)
                ->update([
                    'status'      => Room::STATUS_EXPIRED,
                    'service_hot' => 0
                ]);
        } else {
            DB::table('rooms')->where('id', $id)
                ->update([
                    'status' => Room::STATUS_ACTIVE,
                ]);
        }

        return redirect()->back();
    }

    public function loadWards(Request $request)
    {
        if ($request->ajax()) {
            $district_id = $request->district_id;
            $locations   = Location::where('parent_id', $district_id)->select('id', 'name', 'slug')->get();

            return response()->json($locations);
        }
    }

    public function syncAlbumImageAndProduct($files, $productID)
    {
        foreach ($files as $key => $fileImage) {
            $ext    = $fileImage->getClientOriginalExtension();
            $extend = [
                'png', 'jpg', 'jpeg', 'PNG', 'JPG'
            ];

            if (!in_array($ext, $extend)) return false;

            $filename = date('Y-m-d__') . Str::slug($fileImage->getClientOriginalName()) . '.' . $ext;
            $path     = public_path() . '/uploads/' . date('Y/m/d/');
            if (!\File::exists($path)) {
                mkdir($path, 0777, true);
            }

            $fileImage->move($path, $filename);
            \DB::table('images')
                ->insert([
                    'name'       => $fileImage->getClientOriginalName(),
                    'path'       => $filename,
                    'room_id'    => $productID,
                    'created_at' => Carbon::now()
                ]);
        }
    }

    public function deleteImage($imageID)
    {
        \DB::table('images')->where('id', $imageID)->delete();
        return redirect()->back();
    }
}
