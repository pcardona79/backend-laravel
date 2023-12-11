<?php


namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    //
    public function signup(Request $request){    
        
 
        $userData = User::create($request->except('pasword_confirmation'));
        return response()->json(['message'=>"Usuario Registrado", 'userData'=>$userData,"statusCode"=>200]);
    }


    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Revisar datos ingresados'], 401);
        }

        return $this->respondWithToken($token);
    }


//    public function refresh()
//     {
//         return $this->respondWithToken(auth()->refresh());
//     }
 
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
