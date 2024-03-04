<?php
/*
 * Created Date: 30/11/2023, 22:12
 * Author: Đức Thuấn
 * Email: thuan.td@proteanstudios.com
 * Project: Beehouse
 * ------------------------------------------------------------------
 * Last Modified:
 * Modified By:
 * ------------------------------------------------------------------
 * Copyright (c) 2023 PROS+ Group , Inc
 * ------------------------------------------------------------------
 */

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MapController
{
    public function index(Request $request)
    {
        $rooms = Room::with(['roomOptionItem'])->whereNotNull('x')->whereNotNull('y');
        if ($request->category_id) {
            $rooms->where('category_id', $request->category_id);
        }

        if ($request->city_id)
            $rooms->where('city_id', $request->city_id);

        if ($request->price)
            $rooms->where('price', $request->price);

        if ($request->option_items) {
            foreach ($request->option_items as $option_item) {
                $rooms->whereHas('roomOptionItem', function ($query) use ($option_item) {
                    $query->where('room_option_item.option_item_id', $option_item);
                });
            }
        }

        if ($request->area)
            $rooms->where('area', $request->area);

        $rooms->when($request->get('category_id'), function ($q) use ($request) {
            $q->where('category_id', $request->get('category_id'));
        })
        ->when($request->get('price'), function ($q) use ($request) {
            $q->where('price', $request->get('price'));
        })
        ->when($request->get('area'), function ($q) use ($request) {
            $q->where('area', $request->get('area'));
        });

        $rooms = $rooms->get();

        return view('frontend.pages.map.index', ['rooms' => $rooms, 'lat' => null, 'long' => null]);
    }
}
