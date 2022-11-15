<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use session;
class LoginController extends Controller
{
    public function logincheck(Request $request)
    {
        $uname=$request->get('uname');
        $pws=$request->get('psw');
        if($uname=='admin'&&$pws=='admin@123')
        {
            $request->session()->put('username',$uname);
            return redirect('/index');
        }
        else
        {
            return redirect('/admin');
        }
    }
    public function indexpage()
    {
        return view('backend.index');
    }
    public function logoutUser(Request $request) 
    {
        $request->session()->forget('username');
        
            return redirect('/admin');              
        
    }
}
