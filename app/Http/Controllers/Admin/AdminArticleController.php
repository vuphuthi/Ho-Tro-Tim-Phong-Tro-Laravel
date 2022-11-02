<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AdminArticleController extends Controller
{
    public function index(Request $request)
    {
        $articles = Article::orderByDesc('id')->paginate(20);
        $viewData   = [
            'articles' => $articles
        ];

        return view('admin.pages.article.index', $viewData);
    }

    public function create()
    {
        return view('admin.pages.article.create');
    }

    public function store(Request $request)
    {
        try {
            $data               = $request->except('_token','avatar');
            $data['slug']       = Str::slug($request->name);
            $data['created_at'] = Carbon::now();

            if ($request->avatar) {
                $file = upload_image('avatar');
                if (isset($file) && $file['code'] == 1) {
                    $data['avatar'] = $file['name'];
                }
            }
            Article::create($data);

            return redirect()->route('get_admin.article.index');
        } catch (\Exception $exception) {
            Log::error("---------------------  " . $exception->getMessage());
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $article = Article::find($id);
        $viewData = [
            'article' => $article
        ];

        return view('admin.pages.article.update', $viewData);
    }

    public function update($id, Request $request)
    {
        try {
            $data               = $request->except('_token','avatar');
            $data['slug']       = Str::slug($request->name);

            if ($request->avatar) {
                $file = upload_image('avatar');
                if (isset($file) && $file['code'] == 1) {
                    $data['avatar'] = $file['name'];
                }
            }

            $data['updated_at'] = Carbon::now();
            Article::find($id)->update($data);

            return redirect()->route('get_admin.article.index');
        } catch (\Exception $exception) {
            Log::error("---------------------  " . $exception->getMessage());
            return redirect()->back();
        }
    }
}
