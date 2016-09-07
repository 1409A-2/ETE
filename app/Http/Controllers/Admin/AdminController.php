<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Validator;
use Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\User;
use App\Model\Company;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminIndex()
    {
        return view('admin.login.login'); 
    }
}
