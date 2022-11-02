<?php
/**
 * Created by PhpStorm .
 * User: trungphuna .
 * Date: 10/24/22 .
 * Time: 11:00 PM .
 */

namespace App\Page;

use App\Service\LocationService;
use App\Service\RoomService;
use Illuminate\Http\Request;

class PageHomeService
{
    public static function index(Request $request)
    {
        $roomHots     = RoomService::getRoomsHot($limit = 6);
        $roomNew      = RoomService::getRoomsNew(10);
        $locationsHot = LocationService::getLocationsHot(4);

        $viewData     = [
            'roomHots'     => $roomHots,
            'roomNew'      => $roomNew,
            'locationsHot' => $locationsHot
        ];

        return $viewData;
    }
}
