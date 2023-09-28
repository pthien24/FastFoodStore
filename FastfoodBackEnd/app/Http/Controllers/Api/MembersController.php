<?php

namespace App\Http\Controllers\Api;

use App\Http\BaseResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Member;

class MembersController extends Controller
{
    private $rules = [
        'lastName'=>'required',
        'fisrtName'=>'required',
        'username'=>'required',
        'password'=>'required',
        'email'=>'required|email',
    ];
    private $messages = [
        'lastName.required'=>'last name is empty',
        'fisrtName.required'=>'fisrtName  is empty',
        'username.required'=>'username  is empty',
        'password.required'=>'password  is empty',
        'email.email'=>'invalid email  format',
    ];
    public function register(Request $req)
    {

        $validator = Validator::make($req->all(), $this->rules, $this->messages);
        if ($validator->fails()) {
            return BaseResponse::error(400, $validator->messages()->toJson());
        } else {
            try {
                $member = new Member();
                $member->lastName = $req->lastName;
                $member->fisrtName = $req->fisrtName;
                $member->username = $req->username;
                $member->phone = $req->phone;
                $member->email = $req->email;
                $member->password = bcrypt($req->password);
                $member->save();
                return BaseResponse::withData($member);
            } catch (\Exceptions $e) {
                return BaseResponse::error(500, $e->getMessage());
            }
        }
    }
    public function login(Request $req)
    {
        $data = ['username' => $req->username ,'password'=> $req->password];
        if (auth('member')->attempt($data)) {
            $user = auth('member')->user();
            $user->tokens()->delete();
            $token = $user->createToken('ApiToken')->plainTextToken;
            $authToken =explode('|', $token)[1];
            $data = [
                'id' => $user->id,
                'username' => $user->username,
                'fullname' => $user->name,
                'token' => $authToken,
            ];
            return BaseResponse::withData($data);
        } else {
            return BaseResponse::error(1, "wrong username or password");
        }
    }
    public function profile(Request $request)
    {
        $member =  $request->user();
        return BaseResponse::withData($member);
    }
}
