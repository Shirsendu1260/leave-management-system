<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class HRLoginController extends Controller
{
    // For viewing hr login page
    public function index(){
        return view('hrlogin');
    }

    // For authentication
    public function authenticate(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if($validator->passes()){
            if(Auth::guard('hr')->attempt(['email' => $request->email, 'password' => $request->password])){
                if(Auth::guard('hr')->user()->role != 'HR'){
                    Auth::guard('hr')->logout();
                    return redirect()->route('hr.login')->with('error', 'You are not authorized to access the page.');
                }
                return redirect()->route('hr.dashboard');
            }
            else{
                return redirect()->route('hr.login')->with('error', 'Incorrect login credentials.');
            }
        }
        else{
            return redirect()->route('hr.login')->withErrors($validator)->withInput();
        }
    }

    // For logout
    public function logout(){
        Auth::guard('hr')->logout();
        return redirect()->route('hr.login');
    }
}
