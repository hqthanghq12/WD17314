<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginCotroller extends Controller
{
    //
    public function login(Request $request){
        if($request->isMethod('POST')){
            if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
                return redirect()->route('list');
            }else{
                Session::flash('error', 'Sai mật khẩu hoặc tên đăng nhập');
                return redirect()->route('login');
            }
        }
        return view('auth.login');
    }
}
