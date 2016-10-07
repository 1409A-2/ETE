<?php

namespace App\Http\Middleware;

use Closure;
use \Illuminate\Http\Request;
use App\Model\User;

class LoginMiddleware
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
        $id = session('u_id');
        $list = User::findOnly($id);
        if ($list['u_status']=='0') {
            return redirect('/checkEmail.html');
        }

        return $next($request);
    }
}
