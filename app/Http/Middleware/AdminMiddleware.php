<?php

namespace App\Http\Middleware;

use Closure;
use \Illuminate\Http\Request;
use App\Model\Admin;

class AdminMiddleware
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

        if(!session('uid')){
            return redirect('admin');
        }
        
    
        return $next($request);
    }
}