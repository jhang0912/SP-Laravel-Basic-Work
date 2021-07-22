<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterPostRequest;
use App\Http\Requests\SignInPostRequest;
use App\Models\User;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    /* 會員註冊 */
    public function register(RegisterPostRequest $request)
    {
        $registerPost = $request->validated();

        $database = new User;
        $result = $database->register($registerPost);

        if ($result == true) {
            return response('會員註冊成功');
        }
    }

    /* 會員登入 */
    public function signIn(SignInPostRequest $request)
    {
        $signInPost = $request->all();

        if (Auth::attempt($signInPost)) {
            $member = $request->user();
            $Token = $member->createToken('token');
            $Token->token->save();
            return response(['accessToken' => $Token->accessToken]);
        } else {
            return response('登入失敗，請重新登入');
        }
    }

    /* 取得會員資料 */
    public function member(Request $request)
    {
        $member_data = $request->user();

        return response($member_data);
    }

    /* 會員登出 */
    public function signOut(Request $request)
    {
        $request->user()->token()->revoke();

        return response('登出成功');
    }

    /* 取得會員通知資料並回傳 view(member.notification) */
    public function notification()
    {
        $member = User::find(1);
        $notifications = $member->notifications ?? [];
        $notifications = $notifications->sortby('read_at');

        return view('member.notification', [
            'member' => $member,
            'notifications' => $notifications
        ]);
    }

    /* 將會員通知標記已讀 */
    public function readedNotification(Request $request)
    {
        $id = $request->all()['id'];
        DatabaseNotification::find($id)->markAsRead();
    }
}
