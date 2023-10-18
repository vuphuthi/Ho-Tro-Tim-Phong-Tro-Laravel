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
        $params = $request->all();
        if (isset($params['city_id'])) $params["location_city_id"] = $params['city_id'];
        if (isset($params['district_id'])) $params["location_district_id"] = $params['district_id'];

        $rooms    = RoomService::getListsRoom($request, $params);
        return [
            'rooms'    => $rooms,
            'query'    => $request->query()
        ];
    }
}
