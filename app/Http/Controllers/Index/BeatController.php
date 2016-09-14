<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BeatController extends Controller
{

    /**         一拍首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function beatIndex(){
        return view('index.beat.beatIndex');
    }

    public function beatInfo(){
        return view('index.beat.beatInfo');
    }
    public function beatPro(Request $request){
        return $request->input();
    }
}
