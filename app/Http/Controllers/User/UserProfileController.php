<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdatePhoneRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index()
    {
        $user = User::find(\Auth::user()->id);
        if (!$user) return abort(404);

        return view('user.profile.index',compact('user'));
    }

    public function update(Request $request)
    {
        $user = User::find(\Auth::user()->id);
        if (!$user) return abort(404);
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->avatar) {
            $file = upload_image('avatar');
            if (isset($file) && $file['code'] == 1) {
                $user->avatar = $file['name'];
            }
        }

        $user->save();

        return  redirect()->route('get_user.profile.index');
    }

    public function updatePhone()
    {
        $user = User::find(\Auth::user()->id);
        if (!$user) return abort(404);

        return view('user.profile.update_phone',compact('user'));
    }

    public function processUpdatePhone(UserUpdatePhoneRequest $request)
    {

    }

    public function sendCode(Request $request)
    {
        $user = User::find(\Auth::user()->id);
        if (!$user) return abort(404);

        // lấy user cập nhật
        // check gen code
        // 3 Xử lý check code và update phone
    }
}
