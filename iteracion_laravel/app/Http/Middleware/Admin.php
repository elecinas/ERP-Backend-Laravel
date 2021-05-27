<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Exception;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use Illuminate\Http\Request;

class Admin extends BaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    // public function checkAdmin(Request $request) {

    //     $user = JWTAuth::parseToken()->authenticate();
    //     if ($user->type !== 'admin') {
    //         throw new Exception('You do not have Admin permissions');
    //     }
    // return $user->type;
    // }

    public function handle(Request $request, Closure $next)
    {
        $user = JWTAuth::parseToken()->authenticate();
        $userType = $user->type;

        if ($userType !== 'admin') {
            return response()->json(['status' => 'You do not have Admin permissions']);
        }

        return $next($request);
    }
}
