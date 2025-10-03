<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
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
                return 'success';
            }
        }


        
    }
}
