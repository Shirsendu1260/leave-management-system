<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class HRDashboardController extends Controller
{
    // For showing dashboard of a hr
    public function index(){
        return view('hr.hrdashboard');
    }

    // For showing employee register page
    public function register(){
        return view('hr.regemployee');
    }

    // For registering an employee
    public function makeRegistration(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:4',
            'password_confirmation' => 'required',
            'gender' => 'required|in:Male,Female',
            'dept' => 'required|in:Information Technology,Sales & Marketing,Finance & Accounting,Human Resources',
            'photo' => 'sometimes|image:jpg,jpeg,png',
            'role' => 'required|in:Employee,HR',
        ]);

        if($validator->passes()){
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->gender = $request->gender;
            $user->address = $request->address;
            $user->dept = $request->dept;
            $user->role = $request->role;
            $user->save();

            if($request->photo){
                // Get file extension of the uploaded image
                $ext = $request->photo->getClientOriginalExtension();
                $currentDateTime = Carbon::now()->format('d_m_Y_H_i_s');
                $newFileName = $currentDateTime . '.' . $ext;

                // Move the image file to the specified path
                $request->photo->move(public_path() . '/uploads/users/', $newFileName);

                $user->photo = $newFileName;
                $user->save();
            }

            return redirect()->route('hr.dashboard')->with('success', 'Employee added successfully.');
        }
        else{
            return redirect()->route('hr.emregister')->withErrors($validator)->withInput();
        }
    }

    // For displaying details of employees/hrs in a table
    public function displayEmployees(){
        $employees = User::all();

        return view('hr.totalemployees', ['employees' => $employees]);
    }
}
