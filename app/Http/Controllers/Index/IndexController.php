<?php

namespace App\Http\Controllers\Index;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Session;

class IndexController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index(){
    	return  view('index.index');
    }
    public function indexs(){
    	echo Session::get('u_id')."\t";
        echo Session::get('u_email');
    	return view('index.lar.public');
    }

}
