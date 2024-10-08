<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
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

    // For displaying total applications
    public function displayTotalApplications(){
        $totalapplications = DB::table('applications')
                            ->join('users', 'applications.uid', '=', 'users.id')
                            ->select('applications.id', 'applications.uid', 'users.name', 'users.photo', 'users.email', 'users.gender', 'users.dept', 'applications.from', 'applications.to', 'applications.day', 'applications.reason', 'applications.approved')
                            ->where('applications.approved', '!=', 'Pending')
                            ->get();

        return view('hr.totalapplications', ['totalapplications' => $totalapplications]);
    }

    // For displaying total pending applications
    public function displayPendingApplications(){
        $pendingapplications = DB::table('applications')
                            ->join('users', 'applications.uid', '=', 'users.id')
                            ->select('applications.id', 'applications.uid', 'users.name', 'users.photo', 'users.email', 'users.gender', 'users.dept', 'applications.from', 'applications.to', 'applications.day', 'applications.reason', 'applications.approved')
                            ->where('applications.approved', '=', 'Pending')
                            ->get();

        return view('hr.pendingapplications', ['pendingapplications' => $pendingapplications]);
    }

    // For accepting an application
    public function accept($id){
        $application = DB::table('applications')
                            ->join('users', 'applications.uid', '=', 'users.id')
                            ->select('applications.id', 'users.name', 'users.email', 'applications.from', 'applications.to')
                            ->where('applications.id', '=', $id)
                            ->first();

        $hr = DB::table('users')->select('email')->where('role', '=', 'HR')->first();

        $name = $application->name;
        $from = $application->from;
        $to = $application->to;
        $fromMail = $hr->email;
        $toMail = $application->email;
        $msg = "Your leave application of date $from to $to is ACCEPTED.";
        $sub = "Your leave is granted";

        if($application){
            DB::table('applications')
            ->where('id', $id)
            ->update(['approved' => 'Yes']);

            Mail::to($toMail)->send(new SendMail($fromMail, $sub, $msg));

            return redirect()->route('hr.pendingapplications')->with('yes_msg', "The application of $name of date $from to $to is accepted.");
        }
        else{
            return redirect()->route('hr.pendingapplications')->with('yes_error', 'Unable to accept the application.');
        }
    }

    // For rejecting an application
    public function reject($id){
        $application = DB::table('applications')
                            ->join('users', 'applications.uid', '=', 'users.id')
                            ->select('applications.id', 'users.name', 'users.email', 'applications.from', 'applications.to')
                            ->where('applications.id', '=', $id)
                            ->first();

        $hr = DB::table('users')->select('email')->where('role', '=', 'HR')->first();

        $name = $application->name;
        $from = $application->from;
        $to = $application->to;
        $fromMail = $hr->email;
        $toMail = $application->email;
        $msg = "Your leave application of date $from to $to is REJECTED.";
        $sub = "Your leave is rejected";

        if($application){
            DB::table('applications')
            ->where('id', $id)
            ->update(['approved' => 'No']);

            Mail::to($toMail)->send(new SendMail($fromMail, $sub, $msg));

            return redirect()->route('hr.pendingapplications')->with('no_msg', "The application of $name of date $from to $to is rejected.");
        }
        else{
            return redirect()->route('hr.pendingapplications')->with('no_error', 'Unable to reject the application.');
        }
    }
}
