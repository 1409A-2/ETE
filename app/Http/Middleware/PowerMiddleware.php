<?php

namespace App\Http\Middleware;

use Closure;
use App\Model\Power;
use App\Model\UR;
use \Illuminate\Http\Request;


class PowerMiddleware
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
        if(strpos($_SERVER['REQUEST_URI'],'?')){
            $url = substr($_SERVER['REQUEST_URI'],1,strpos($_SERVER['REQUEST_URI'],'?')-1);
        }else{
            $url = substr($_SERVER['REQUEST_URI'],1);
        }
        
        $p_id = Power::selPid($url);

        $power = UR::selPower(session('uid')['a_id']);
        if(in_array($p_id,$power)){
            return $next($request);
        }
        
        echo "<script>alert('权限不足');history.go(-1)</script>";die;
    }
}  