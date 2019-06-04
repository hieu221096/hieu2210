<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use App\Http\Requests\LoginRequest;
use App\User;
use Hash;
use Auth;
class LoginController extends Controller
{
    public function getLogin(){
    	return view('Page.login');
    }
    public function postlogin(LoginRequest $req){
    	$RequestsLogin = array('email' => $req->email , 'password' => $req->password );
        $RequestsLoginAdmin = array('email' => $req->email , 'password' => $req->password , 'level' => 'admin' );
    	if(Auth::attempt($RequestsLogin)){
            if(Auth::attempt($RequestsLoginAdmin)){
                return redirect()->route('indexadmin');
            }
            else{
    		  return redirect()->route('trangchu')->with('message','Login susscess , Shopping Now !!!');
            }
            
        }         
    	else{
    		return redirect()->back()->with('message','sai email hoac password');
    	}
    }
    public function getLogout(){
    	Auth::logout();
    	return redirect()->route('trangchu');
    }
}
