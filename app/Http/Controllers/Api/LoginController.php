<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use \Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    /**
     * ログイン
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return Response
     */

    public function login(Request $request)
    {
        $result = false;
        $status = 401;
        $message = 'ユーザが見つかりません。';
        $user = null;

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Success
            $result = true;
            $status = 200;
            $message = 'OK';
            $user = Auth::user();

            // ※古いトークン削除&新しいトークン生成
            $user->tokens()->where('name', 'token-name')->delete();
            $token = $user->createToken('token-name')->plainTextToken;
        }
        return response()->json(['result' => $result, 'status' => $status, 'message' => $message]);
    }

    /**
     * ログアウト
     *
     * @return Response
     */
    public function logout()
    {
        Auth::logout();
        $result = true;
        $status = 200;
        $message = 'ログアウトしました。';
        return response()->json(['result' => $result, 'status' => $status, 'message' => $message]);
    }
}
