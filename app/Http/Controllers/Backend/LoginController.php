<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function loginForm() {
        return view('admin.pages.auth.login');
    }


    public function login(Request $request) {
        $validate = Validator::make($request->all(),[
            'email' => 'required|email|max:50',
            'password' => 'required|string|max:32|min:4',
        ]);

        if ($validate->passes()) {
            $credention = [
                'email' => $request->email,
                'password' => $request->password,
            ];

            if (Auth::attempt($credention)) {
                Toastr::success('login successfully!');
                return redirect()->route('admin.dashboard');
            }else{
                Toastr::error('email or pass went wrong!');
                return redirect()->route('admin.login');
            }
        }

    }

    public function  logout() {
        
        if (Auth::check()) {
            Auth::logout();
            Toastr::success('logout success');
            return redirect()->route('admin.login');
        }
    }
}
