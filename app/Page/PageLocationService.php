<?php
/**
 * Created by PhpStorm .
 * User: trungphuna .
 * Date: 10/25/22 .
 * Time: 11:24 PM .
 */

namespace App\Page;

use App\Models\Location;
use App\Service\RoomService;
use Illuminate\Http\Request;

class PageLocationService
{
    public static function index($id, Request $request)
    {
        $location = Location::find($id);
        $rooms    = RoomService::getListsRoom($request, $params = [
            'location_city_id' => $id
        ]);

        $districts = Location::where('parent_id', $id)->limit(24)->get();

        return [
            'location'  => $location,
            'rooms'     => $rooms,
            'districts' => $districts,
            'query'     => $request->query()
        ];
    }

    public static function indexByDistrict($id, Request $request)
    {
        $location = Location::find($id);
        $rooms    = RoomService::getListsRoom($request, $params = [
            'location_district_id' => $id
        ]);

        return [
            'location'  => $location,
            'rooms'     => $rooms,
            'query'     => $request->query()
        ];
    }
}
