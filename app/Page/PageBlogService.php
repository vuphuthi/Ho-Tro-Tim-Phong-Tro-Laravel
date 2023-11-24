<?php
/**
 * Created by PhpStorm .
 * User: trungphuna .
 * Date: 10/26/22 .
 * Time: 10:21 PM .
 */

namespace App\Page;

use App\Models\Article;
use App\Service\ArticleService;
use Illuminate\Http\Request;

class PageBlogService
{
    public static function index(Request $request)
    {
        $articles = ArticleService::getListsArticles($request, []);

        $viewData = [
            'articles' => $articles
        ];

        return $viewData;
    }

    public static function getArticleDetail($id, Request $request)
    {
        $article  = Article::find($id);

        $viewData = [
            'article' => $article
        ];

        return $viewData;
    }
}
