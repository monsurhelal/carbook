<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DriverLoginController extends Controller
{
    public function driverLoginForm(){
        return view('frontend.pages.driver.auth.login');
    }

    public function driverLogin(Request $request){

        // dd($request->all());
         $validated = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required|string|min:4'
        ]);

         if($validated->passes()){
            $email = $request->email;
            $password = $request->password;
            if(Auth::guard('driver')->attempt(['email' => $email, 'password' => $password])){
                return redirect()->route('driver.deshboard');
            };
        }
    }

    public function driverLogout(){
        Auth::guard('driver')->logout();
        return redirect()->route('driver.login.form');
    }

}
