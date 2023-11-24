<?php
/**
 * Created by PhpStorm .
 * User: trungphuna .
 * Date: 10/24/22 .
 * Time: 11:00 PM .
 */

namespace App\Service;

use App\Models\Room;
use Illuminate\Support\Arr;

class RoomService
{
    protected $column = ['id','avatar','name','description','full_address','price','updated_at','area','slug','service_hot'];

    public static function getRoomsHot($limit = 8)
    {
        $self = new self();
        return Room::where('hot', 1)
            ->whereIn('status',[ROOM::STATUS_ACTIVE, Room::STATUS_EXPIRED])
            ->limit($limit)->select($self->column)->get();
    }

    public static function getRoomsNew($limit = 10)
    {
        $self = new self();
        return Room::whereIn('status',[ROOM::STATUS_ACTIVE, Room::STATUS_EXPIRED])
            ->limit($limit)
            ->select($self->column)
            ->orderByDesc('id')
            ->get();
    }

    public static function getListsRoomVip($limit = 10, $params = [])
    {
        $self = new self();
        $room =  Room::whereIn('status',[ROOM::STATUS_ACTIVE, Room::STATUS_EXPIRED]);

        if ($service_hot =  Arr::get($params, 'service_hot'))
            $room->where('service_hot', $service_hot);

        return $room
            ->limit($limit)
            ->select($self->column)
            ->orderByDesc('id')
            ->get();
    }

    public static function getRoomsNewVip($limit = 10, $params = [])
    {
        $self = new self();
        $room =  Room::whereIn('status',[ROOM::STATUS_ACTIVE, Room::STATUS_EXPIRED]);
        $room->whereBetween('service_hot', [2,4]);

        return $room
            ->select($self->column)
            ->orderByDesc('service_hot')
            ->paginate($limit);
    }

    public static function getListsRoom($request, $params = [])
    {
        $self = new self();
        $rooms = Room::whereIn('status',[ROOM::STATUS_ACTIVE, Room::STATUS_EXPIRED]);

        if ($categoryId = Arr::get($params,'category_id'))
            $rooms->where('category_id', $categoryId);

        if ($cityId = Arr::get($params,'location_city_id'))
            $rooms->where('city_id', $cityId);

        if ($district_id = Arr::get($params,'location_district_id'))
            $rooms->where('district_id', $district_id);

        if ($wards_id = Arr::get($params,'wards_id'))
            $rooms->where('wards_id', $wards_id);

        if ($range_price = Arr::get($params,'price'))
            $rooms->where('range_price', $range_price);

        if ($range_area = Arr::get($params,'area'))
            $rooms->where('range_area', $range_area);

        $rooms = $rooms->select($self->column)->orderByDesc('id')->paginate(10);

        return $rooms;
    }
}
