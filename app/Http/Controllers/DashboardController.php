<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    // For showing dashboard of an employee
    public function index(){
        return view('employee.dashboard');
    }

    // For showing Apply Leave Application page
    public function apply(){
        return view('employee.applyleave');
    }

    // For submitting application
    public function submitapplication(Request $request){
        $validator = Validator::make($request->all(), [
            'from' => 'required',
            'to' => 'required',
            'day' => 'required|integer|min:1',
            'reason' => 'required',
        ]);

        if($validator->passes()){
            $application = new Application();
            $application->from = $request->from;
            $application->to = $request->to;
            $application->day = $request->day;
            $application->reason = $request->reason;
            $application->approved = 'Pending';
            $application->uid = Auth::user()->id;
            $application->save();

            return redirect()->route('account.apply')->with('success', 'Your leave application is submitted successfully.');
        }
        else{
            return redirect()->route('account.apply')->withErrors($validator)->withInput();
        }
    }

    // For displaying all of the leave applications of a specific user
    public function displayLeaveApplications(){
        $applications = Application::where('uid', Auth::user()->id)->get();

        return view('employee.leavestatuses', ['applications' => $applications]);
    }

    // For showing edit profile page
    public function editProfile(){
        $employee = User::findOrFail(Auth::user()->id);

        return view('employee.editProfile', ['employee' => $employee]);
    }

    // For updating details of an employee
    public function updateProfile(Request $request){
        $validator = Validator::make($request->all(), [
            'gender' => 'in:Male,Female',
        ]);

        if($validator->passes()){
            $user = User::find(Auth::user()->id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->gender = $request->gender;
            $user->address = $request->address;
            $user->save();

            return redirect()->route('account.dashboard')->with('success', 'Profile updated successfully.');
        }
        else{
            return redirect()->route('account.editProfile')->withErrors($validator)->withInput();
        }
    }
}
