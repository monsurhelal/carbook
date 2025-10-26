<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserLoginController extends Controller
{
    public function  loginForm(){
        return view('frontend.pages.auth.login');
    }
    public function  login(Request $request){
        $validated = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required|min:4'
        ]);

        if($validated->passes()){
            $email = $request->email;
            $password = $request->password;
            if(Auth::attempt(['email' => $email, 'password' => $password])){
                return redirect()->route('user.deshboard');
            };
        }
    }

    public function  registationForm() {
         return view('frontend.pages.auth.register');
    }

    public function registation(UserStoreRequest $request){


        User::updateOrCreate([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->number,
            'password' => Hash::make($request->password)
        ]);
        return redirect()->route('user.deshboard');
    }

    public function userLogout() {
        if (Auth::check()) {
            Auth::logout();
            return redirect()->route('login.form');
        }
    }
}
