<?php
/**
 * Created by PhpStorm .
 * User: trungphuna .
 * Date: 10/26/22 .
 * Time: 10:21 PM .
 */

namespace App\Service;

use App\Models\Article;

class ArticleService
{
    protected $column = ['id','avatar','name','description','slug'];

    public static function getListsArticles($request, $params = [])
    {
        $self = new self();
        $rooms = Article::whereRaw(1);

        $rooms = $rooms->select($self->column)->orderByDesc('id')->paginate(10);

        return $rooms;
    }
}
