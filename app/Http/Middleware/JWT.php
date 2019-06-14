<?php

namespace App\Http\Middleware;

use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Middleware\BaseMiddleware;

class JWT extends BaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, \Closure $next)
    {
        if (! $token = $this->auth->setRequest($request)->getToken()) {
            return $this->respond('tymon.jwt.absent', 'token_not_provided', 400);
        }

        try {
            $user = $this->auth->authenticate($token);
        } catch (TokenExpiredException $e) {
            return response()->json(['success' => false, 'message' => 'token_expired'], 403);
        } catch (JWTException $e) {
            return response()->json(['success' => false, 'message' => 'token_invalid'], 403);
        }

        if (! $user) {
            return response()->json(['success' => false, 'message' => 'user_not_found'], 404);
        }

        $this->events->fire('tymon.jwt.valid', $user);

        return $next($request);
    }
}
