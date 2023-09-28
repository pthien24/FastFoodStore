<?php

namespace App\Http\Controllers\Api;

use App\Http\BaseResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    public function login(Request $request)
    {
        $data = [
            'username'=>$request->username,
            'password'=>$request->password,
            ];
        if (auth()->attempt($data)) {
            $user = auth()->user();
            $token = hash('sha256', time() . Str::random(50));
            $user->forceFill(['api_token' => $token])->save();
            $data = [
                'id'=> $user->id,
                'username'=> $user->username,
                'fullname'=> $user->name,
                'token'=> $token,
            ];
            return BaseResponse::withData($data);
        } else {
            return BaseResponse::error(1, 'wrong user name or password');
        }
    }
}
