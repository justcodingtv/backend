<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\User\AuthInfoResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\JWTAuth;

class LoginController extends Controller
{
    public function login (LoginRequest $request)
    {
        if ($token = Auth::guard('api')->attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {
            return $this->respondWithToken($token);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    public function check ()
    {
        return new AuthInfoResource(Auth::user());
    }

    protected function respondWithToken ($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60,
            'user' => new AuthInfoResource(Auth::user()),
        ], 200);
    }
}
