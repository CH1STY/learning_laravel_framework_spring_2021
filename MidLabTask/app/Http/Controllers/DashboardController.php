<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(Request $request)
    {
        if($request->session()->get('usertype')=='admin')
        {
            return view('user.admin');
            
        }
        elseif($request->session()->get('usertype')=='accountant')
        {
            
            return view('user.accountant');
        }
        elseif($request->session()->get('usertype')=='customer')
        {
            
            return view('user.customer');
        }
        elseif($request->session()->get('usertype')=='vendor')
        {
            
            return view('user.vendor');
        }
    }
}
