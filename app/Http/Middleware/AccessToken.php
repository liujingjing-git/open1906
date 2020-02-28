<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redis;

class AccessToken
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
        //验证token是否可用
        $token = request()->get('token');
        if(empty($token))
        {
            echo "授权失败 缺少 access_token";die;
        }
        $redis_h_token = 'h:access_token:'.$token;
        $data = Redis::hGetAll($redis_h_token);
        var_dump($data);
        
        if(empty($data))
        {
            echo "授权失败 , access_token 无效";echo "<hr>";
        }

        return $next($request);
    }
}
