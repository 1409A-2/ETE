<?php

namespace App\Http\Middleware;

use Closure;
use \Illuminate\Http\Request;
use App\Model\User;
use App\Model\Company;

class CompanyMiddleware
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
        $u_id = session('u_id');
        $user_data = User::selOne($u_id);
        if($user_data['u_cid']==0){
            return redirect('/');
        }elseif($user_data['u_cid']==1){
            return redirect('info');
        }

        return $next($request);
    }
}
