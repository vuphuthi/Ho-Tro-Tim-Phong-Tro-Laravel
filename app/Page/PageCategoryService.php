<?php
/**
 * Created by PhpStorm .
 * User: trungphuna .
 * Date: 10/25/22 .
 * Time: 12:20 AM .
 */

namespace App\Page;

use App\Models\Category;
use App\Service\RoomService;
use Illuminate\Http\Request;

class PageCategoryService
{
    public static function index($id, Request $request)
    {
        $category = Category::find($id);
        $rooms    = RoomService::getListsRoom($request, $params = [
            'category_id' => $id
        ]);
        return [
            'category' => $category,
            'rooms'    => $rooms,
            'query'    => $request->query()
        ];
    }
}
