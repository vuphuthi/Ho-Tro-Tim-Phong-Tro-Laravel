<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Page\SearchRoomService;
use Illuminate\Http\Request;

class SearchRoomController extends Controller
{
    public function index(Request $request)
    {
        $data = SearchRoomService::index($request);
        return view('frontend.pages.search_room.index', $data);
    }
}
