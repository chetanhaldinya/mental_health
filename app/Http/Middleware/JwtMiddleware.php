<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
            //Added Security layer, so the unauthorized user never knows about the other apps api url.
            if (request()->is('*api/v1/customer*')) {
                if (!checkUserIsCustomer($user)) {
                    return response()->json([
                        'status' => false,
                        'message' => 'Resource not found.',
                    ], 404);
                }
            }
            if (request()->is('*api/v1/admin*')) {
                if (!checkUserIsAdmin($user)) {
                    return response()->json([
                        'status' => false,
                        'message' => 'Resource not found.',
                    ], 404);
                }
            }
            if (request()->is('*api/v1/team*')) {
                if (!checkUserIsTeam($user)) {
                    return response()->json([
                        'status' => false,
                        'message' => 'Resource not found.',
                    ], 404);
                }
            }
            if (request()->is('*api/v1/support-care*')) {
                if (!checkUserIsSupportCare($user)) {
                    return response()->json([
                        'status' => false,
                        'message' => 'Resource not found.',
                    ], 404);
                }
            }
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                return response()->json(['status' => 'Token is Invalid']);
            } else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                return response()->json(['status' => 'Token is Expired']);
            } else {
                return response()->json(['status' => 'Authorization Token not found.']);
            }
        }
        return $next($request);
    }
}
