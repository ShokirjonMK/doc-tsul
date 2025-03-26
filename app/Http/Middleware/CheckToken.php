<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
//use Dingo\Api\Auth\Auth;
use Illuminate\Support\Facades\Auth;

class CheckToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = $request->header('X-Access-Token');
        if(!$token){
             return response()->json(['msg'=>'Token kerak'], 401);
        }
        $user = User::where('api_token', $token)->where('status', 1)->select('id', 'name', 'username', 'role','status')->first();
        if($user){
            $request['user'] = $user;
            Auth::login($user);
             return $next($request);
        }
        else{
            return response()->json(['msg'=>'Topilmadi'], 401);

        }
    }
}
