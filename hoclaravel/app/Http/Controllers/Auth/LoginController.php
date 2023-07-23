<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    //
    public function login(LoginRequest $request){
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
    public function register(LoginRequest $request){
        if($request->isMethod('POST')){
            $params = $request->except('_token');
            $params['password'] = Hash::make($request->password);
            $params['email_verified_at'] = Carbon::now('Asia/Ho_Chi_Minh');
            $user = User::create($params);
            if($user->id){
                Session::flash('success', 'Thêm tài khoản thành công');
                return redirect()->route('login');
            }
        }
        return view('auth.register');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

}
