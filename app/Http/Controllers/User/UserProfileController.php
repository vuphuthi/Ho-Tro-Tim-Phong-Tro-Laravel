<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdatePhoneRequest;
use App\Jobs\JobSendEmailCodeChangePhone;
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
        $user = User::find(\Auth::user()->id);
        if($request->code != $user->code) {
            return redirect()->back()->with(['error' => 'Mã OTP không đúng']);
        }

        $user->phone = $request->phone_new;
        $user->code = null;
        $user->save();

        return redirect()->back()->with(['success' => 'Cập nhật thành công']);
    }

    public function sendCode(Request $request)
    {
        if ($request->ajax()){
            $user = User::find(\Auth::user()->id);
            if (!$user) return abort(404);
            $code = generateRandomString(10);
            $user->code = $code;
            $user->save();

            $emailJob = new JobSendEmailCodeChangePhone($user);
            dispatch($emailJob);
        }
    }
}
