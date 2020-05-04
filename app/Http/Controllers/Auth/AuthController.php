<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Traits\HandleJsonResponses;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    use HandleJsonResponses;

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $token = null;
        try {
            $token = $this->guard()->attempt($credentials);
        } catch (JWTException $e) {
            return $this
                ->message(__('An error occurred while creating the token.'))
                ->respondInternalServerError();
        }
        return $this
            ->respondOk([
                'token' => $token,
                'token_type' => 'Bearer'
            ]);
    }

    public function logout()
    {
        if (! $this->guard()->check()) {
            return $this->message(__('Cannot take action.'))->respondBadRequest();
        }

        $this->guard()->logout();

        return $this
            ->message(__('Successfully logged out.'))
            ->respondOk()
            ;
    }

    public function refresh()
    {

        // Todo
        // Because api web basic, So in dont apply refresh token

//        if ($token = $this->guard()->refresh()) {
//            return $this
//                ->message(__('Refresh token is successful.'))
//                ->respondOk([
//                    'token' => $token,
//                    'token_type' => 'Bearer'
//                ]);
//        }
    }

}
