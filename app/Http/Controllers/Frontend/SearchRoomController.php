<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Page\SearchRoomService;
use Illuminate\Http\Request;

class SearchRoomController extends Controller
{
    public function index(Request $request)
    {
        $data = SearchRoomService::index($request);

        if ($request->city_id)
        {
            $districts = Location::where('parent_id', $request->city_id )->get();
            $data['districts'] = $districts;
        }

        if ($request->district_id)
        {
            $wards = Location::where('parent_id', $request->district_id )->get();
            $data['wards'] = $wards;
        }
        return view('frontend.pages.search_room.index', $data);
    }
}
