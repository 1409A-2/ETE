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
        }

        if($user_data['u_cid']==1){

            return redirect('info');
        }

        $data = Company::selBase($user_data['u_cid']);
        $re = true;

        foreach($data as $key => $val){
            if($val == ''){
                $re = false;
            }
        }
        if($data['c_status']!=2){

            $re = false;
        }

        if(!$re){
            return redirect('detailed');
        }

        return $next($request);
    }
}
