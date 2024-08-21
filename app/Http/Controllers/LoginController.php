<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // For viewing employee login page
    public function index(){
        return view('login');
    }

    // For authentication
    public function authenticate(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if($validator->passes()){
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                return redirect()->route('account.dashboard');
            }
            else{
                return redirect()->route('account.login')->with('error', 'Incorrect login credentials.');
            }
        }
        else{
            return redirect()->route('account.login')->withErrors($validator)->withInput();
        }
    }

    // For logout
    public function logout(){
        Auth::logout();
        return redirect()->route('account.login');
    }
}