<?php

namespace App\Http\Middleware;

use App\Http\Traits\HandleJsonResponses;
use Closure;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class VerifyJWTToken
{
    use HandleJsonResponses;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            if (! $user = JWTAuth::parseToken()->authenticate()) {

                return $this->message('User not found')->respondNotFound();
            }
        }catch (TokenExpiredException $e) {

            return $this->message(__('Token expired'))->respondUnauthorized();
        }catch (TokenInvalidException $e) {

            return $this->message(__('Token invalid'))->respondUnprocessableEntity();
        }catch (JWTException $e) {

            return $this->message('Missing token.')->respondUnprocessableEntity();
        }

        return $next($request);
    }
}
