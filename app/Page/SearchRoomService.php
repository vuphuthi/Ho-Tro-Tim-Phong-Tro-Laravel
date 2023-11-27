<?php
/**
 * Created by PhpStorm .
 * User: trungphuna .
 * Date: 10/27/22 .
 * Time: 12:15 AM .
 */

namespace App\Page;

use App\Models\Category;
use App\Service\RoomService;
use Illuminate\Http\Request;

class SearchRoomService
{
    public static function index(Request $request)
    {
        $filters = $request->all();
        $params = [];
        if (isset($filters['city_id'])) $params["location_city_id"] = $filters['city_id'];
        if (isset($filters['district_id'])) $params["location_district_id"] = $filters['district_id'];
        if (isset($filters['district_id'])) $params["location_district_id"] = $filters['district_id'];
        if (isset($filters['wards_id'])) $params["wards_id"] = $filters['wards_id'];
        if (isset($filters['price'])) $params["price"] = $filters['price'];

        $rooms    = RoomService::getListsRoom($request, $params);
        return [
            'rooms'    => $rooms,
            'query'    => $request->query()
        ];
    }
}
