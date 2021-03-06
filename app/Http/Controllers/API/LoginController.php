<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function adminlogin(Request $request){
        // validate request
        $this->validate($request, [
            'email' => 'bail|required|email',
            'password' => 'bail|required|min:6',
        ]);
        $credentials = $request->only('email', 'password');

        if (Auth::guard('api')->attempt($credentials)) {
            $user = Auth::guard('api')->user();

            if($user->userType == 'user'){
                Auth::logout();
                return response()->json([
                    'msg' => 'You do Not have Access',
                ], 401);
            }

            return response()->json([
                'msg' => 'You are logged in',
                'user' => $user
            ]);
        }else{
            return response()->json([
                'msg' => 'Incorrect login details',
            ], 401);
        }
        /* if(auth('api')::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = auth('api')->user();
            if($user->userType == 'user'){
                Auth::logout();
                return response()->json([
                    'msg' => 'You do Not have Access',
                ], 401);
            }

            return response()->json([
                'msg' => 'You are logged in',
                'user' => $user
            ]);

        }else{
            return response()->json([
                'msg' => 'Incorrect login details',
            ], 401);
        } */
    }
}
