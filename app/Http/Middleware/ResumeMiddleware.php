<?php

namespace App\Http\Middleware;

use Closure;
use \Illuminate\Http\Request;
use App\Model\User;

class ResumeMiddleware
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

        if(!session('u_id')){
            return redirect('login.html');
        }
        $u_id = session('u_id');
        $user_data = User::selOne($u_id);
        if($user_data['u_cid']!=0){
            return redirect('/');
        }
        return $next($request);
    }
}
