<?php
/**
 * Created by PhpStorm .
 * User: trungphuna .
 * Date: 10/25/22 .
 * Time: 11:20 PM .
 */

namespace App\Service;

use App\Models\Location;

class LocationService
{
    public static function getLocationsHot($limit)
    {
        return Location::withCount('rooms')->where('hot',1)->limit($limit)->get();
    }
}
