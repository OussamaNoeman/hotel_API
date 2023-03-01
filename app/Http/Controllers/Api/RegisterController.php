<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginUserValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends BaseController
{
    public function login(LoginUserValidator $loginUserValidator)
    {
        if(!empty($loginUserValidator->getErrors()))
        {
            return response()->json($loginUserValidator->getErrors(),406);
        }
        $request = $loginUserValidator->request();
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            $user = Auth::user();
            $success['name']=$user->name;
            $success['token']=$user->createToken('MyApp')->plainTextToken;
            return $this->sendResponse($success);
        }else{
            return $this->sendResponse('Unauthorized','fail',401);
        }
    }
}
