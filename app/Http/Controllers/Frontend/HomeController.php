<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Page\PageHomeService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return "Xin Chào";
        $data = PageHomeService::index($request);
        return view('frontend.pages.home.index', $data);
    }

    public function getServicePrice()
    {
        return view('frontend.pages.service.index');
    }
}
