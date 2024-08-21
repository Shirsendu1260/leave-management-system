<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
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
}
