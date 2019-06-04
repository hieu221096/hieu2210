<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use App\Http\Requests\RegisterRequest;
use App\User;
use Hash;
class SignUpController extends Controller
{
    public function getSignUp(){
        return view('Page.signup');
     }
    public function postSignUp(RegisterRequest $req){
    	$User =  new User();
    	$User->full_name = $req->name;
    	$User->email = $req->email;
    	$User->password = Hash::make($req->password);
    	$User->phone = $req->phone;
    	$User->address = $req->address;
    	$User->level = 'user';
    	$User->save();
    	return redirect()->back()->with('alert', 'Đăng Kí Thành công , Vui lòng đăng nhập để tiếp tục');

    }
}
