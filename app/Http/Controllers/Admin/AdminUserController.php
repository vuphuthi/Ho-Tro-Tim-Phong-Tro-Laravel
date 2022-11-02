<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::paginate(20);
        $viewData = [
            'users' => $users
        ];

        return view('admin.pages.user.index', $viewData);
    }
}
