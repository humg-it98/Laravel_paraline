<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Permission;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function AuthLogin(){
        $admin_id = Auth::id();
        if($admin_id){
            return Redirect::to('home');
        }else{
            Toastr::error('Ban chua login, ai cho vao');
            return Redirect::to('login')->send();
        }
    }

    public function index(){
        $this->AuthLogin();
        return view('home');
    }
    public function login(){
        $admin_id = Auth::id();
        if($admin_id) {
            return Redirect::to('home');
        }else{
            return view('login');
        }
    }

    public function loginAdmin(){
        $admin_id = Auth::id();
        if($admin_id) {
            return Redirect::to('home');
        }else{
            return view('login');
        }
    }
    public function postLoginAdmin(LoginRequest $request){
        $loginInfo = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        $remember = $request->has('remember_me') ? true : false;

        if (Auth::attempt($loginInfo, $remember)) {
            Toastr::success('Alo người Việt Nam ơi', 'Thông báo');
            return redirect()->to('home');
        } else {
            Toastr::error('Thông tin bạn nhập không đúng.', 'Thông báo');
            return redirect()->back();
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Toastr::info('Bạn vừa đăng xuât thành công', 'Thông báo');
        return redirect()->route('login');
    }

    public function search(){
        echo 'tesdt';
    }
}
