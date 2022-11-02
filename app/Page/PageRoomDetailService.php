<?php
/**
 * Created by PhpStorm .
 * User: trungphuna .
 * Date: 10/24/22 .
 * Time: 11:01 PM .
 */

namespace App\Page;

use App\Models\Room;
use App\Models\User;
use App\Service\RoomService;
use Illuminate\Http\Request;

class PageRoomDetailService
{
    public static function index(Request $request, $id)
    {
        $room          = Room::with('category:id,name,slug','city:id,name,slug')->find($id);
        $author        = User::find($room->auth_id);
        $roomsSuggests = RoomService::getListsRoom($request, $params = [
            'category_id' => $room->category_id
        ]);

        $viewData = [
            'room'          => $room,
            'author'        => $author,
            'roomsSuggests' => $roomsSuggests
        ];

        return $viewData;
    }
}
