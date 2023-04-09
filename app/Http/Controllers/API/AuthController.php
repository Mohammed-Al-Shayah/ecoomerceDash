<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\loginReauest;
use App\Http\Resources\V1\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(loginReauest $request)
    {


        $user = User::whereEmail($request->email)->first();
        if($user) {

            if(Hash::check($request->password, $user->password)) {

                Auth::login($user);

                $token = $user->createToken('login')->plainTextToken;
                // $data =  [
                //     'token' => $token
                // ];
                return response()->json([
                    'message' => 'Login Successfully',
                    'status' => 'Success',
                    'data' => [
                        'token' => $token
                    ]
                ], 200);
               // return response()->success($data,"sucess",200);

            }else {
                return response()->json([
                    'message' => 'Password does Not Match',
                    'status' => 'Success',
                    'data' => []
                ], 200);
            }

        }else {
            return response()->json([
                'message' => 'No User Found',
                'status' => 'Success',
                'data' => []
            ], 404);
        }


    }

    public function profile(Request $request)
    {
        $user=User::findOrFail($request->id);
        return response()->success(new UserResource($user),"sucess",200);
    }

    public function list_of_users(Request $request)
    {
        $users=User::all();
        return response()->success(UserResource::collection($users),"sucess",200);
    }
}
