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
        $rooms    = RoomService::getListsRoom($request, $request->all());
        return [
            'rooms'    => $rooms,
            'query'    => $request->query()
        ];
    }
}
