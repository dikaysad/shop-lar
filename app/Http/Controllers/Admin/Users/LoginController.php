<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    //
    public function index()
    {
        return view('admin.users.login', [
            'title'=>'Đăng nhập hệ thống'
        ]);
    }

    public function store(Request $request)
    {
        //loi khong nhap mat khau email
        $this-> validate($request,[
            'email' => 'required|email:filter',
            'password'=>'required'
        ]);
        //check tai khoan mat khau
        if(\Auth::attempt([
            'email'=> $request -> input('email'),
            'password'=>$request -> input ('password')
        ],$request->input('remember'))){
            return redirect() ->route('admin');
        }

        \Session::flash('error','Email hoặc Password không đúng');
         return redirect()->back();

    }
}
