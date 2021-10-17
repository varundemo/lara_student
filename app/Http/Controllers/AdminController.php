<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Validator;
use Auth;
use Session;

class AdminController extends Controller
{   
    public function loginadmin(){
        if(session("is_active") == 1){
            return redirect('/');
        }else{
            return view('admin.login');

        }
    }

    public function checkLogin(Request $request){
        $validtor = Validator::make(array(
            "email"=>$request->adminname,
            "password"=>$request->adminpass,
        ),array(
            "email"=>"required",
            "password"=>"required"
        ));
        if($validtor->fails()){
            return redirect('/login')->withErrors($validtor)->withInput();
        }
        else{
            $user_info = array(
                "email"=>$request->adminname,
                "password"=>$request->adminpass
            );
            // print_r($user_info);
            if(auth()->guard("admin")->attempt($user_info)){
                $log_user_detail = auth()->guard("admin")->user();
                session(['is_active'=>1]);
                session(['user_details'=>$user_info]);
                print_r($log_user_detail);
                return redirect('/');
            }
            else{
                // return "wrong information";
                $error_msg = "Invalid User";
                return redirect()->back()->withErrors($error_msg);
            }

        }
    }

    public function checkLogout(){
        Session::flush();
        Auth::guard("admin")->logout();
        return redirect('/login');
    }
}
