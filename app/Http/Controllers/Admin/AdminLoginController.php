<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;

class AdminLoginController extends Controller
{
    public function login(Request $request)
    {

        if ($request->isMethod('post')) {
            $rules = [
                'email' => 'required|email|max:255',
                'password' => 'required',
            ];

            // this is custome meg
            $custommesg = [
                'email.required' => 'Email is required',
                'password.required' => 'Password is required',

            ];
            $this->validate($request, $rules, $custommesg);
            $data = $request->all();

            if (Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']])) //checkid pass
            {
                //check auth super admin 
                if (Auth::guard('admin')->user()->type == "Super-Admin") 
                {
                    if (Auth::guard('admin')->user()->status == "0") {
                        return redirect()->back()->with('error_message', 'Your Account  is Not Active.Please Contant To Admin');
                    } else {
                        return redirect('Dashboard');
                    }
                }
                //check admin with plan status
                if (Auth::guard('admin')->user()->type == "Admin" )
                  {
                    if(Auth::guard('admin')->user()->plan_status == "0")
                    {
                        return redirect()->back()->with('error_message', 'Your Subscription Plan Is Expired!. Contact To Admin');
                    }
                    else
                    {
                        return redirect('school_owner_dashboard');
                    }
                    
                  } 
                
                // school admin with owner plan status
                if (Auth::guard('admin')->user()->type == "School-Admin")
                {
                   
                    $findowneradmin = Admin::where('id',Auth::guard('admin')->user()->id)->first();
                     $findadminstatus = Admin::where('id', $findowneradmin->created_by)->first();
                    if($findadminstatus->plan_status == "1")
                    {
                        return redirect('school-admin-dashboard');
                    }
                    else{

                        return redirect()->back()->with('error_message', 'Your Owner Account   is Not Subscribed.Please Contant To Admin');

                    }

                }

                //login student 
                if (Auth::guard('admin')->user()->type == "Student")
                {
                   
                    $findowneradmin = Admin::where('id',Auth::guard('admin')->user()->id)->first();
                     $findadminstatus = Admin::where('id', $findowneradmin->created_by)->first();
                     $findstudentstatus = Admin::where('id', $findadminstatus->created_by)->first();
                    if($findstudentstatus->plan_status == "1")
                    {
                        return redirect('st-profile');
                    }
                    else{

                        return redirect()->back()->with('error_message', 'Student Your Owner Account   is Not Subscribed.Please Contant To School Principle');

                    }

                }
                //Login Teacher
                if (Auth::guard('admin')->user()->type == "Teacher")
                {
                   
                    $findowneradmin = Admin::where('id',Auth::guard('admin')->user()->id)->first();
                     $findadminstatus = Admin::where('id', $findowneradmin->created_by)->first();
                     $findteachertatus = Admin::where('id', $findadminstatus->created_by)->first();
                    if($findteachertatus->plan_status == "1")
                    {
                        return redirect('teacher-dashboard');
                    }
                    else{

                        return redirect()->back()->with('error_message', 'Teacher Your Owner Account   is Not Subscribed.Please Contant To School Principle');

                    }

                }
                //Login Accountant
                if (Auth::guard('admin')->user()->type == "Accountant")
                {
                    
                    $findowneradmin = Admin::where('id',Auth::guard('admin')->user()->id)->first();
                        $findadminstatus = Admin::where('id', $findowneradmin->created_by)->first();
                        $findAccountanttatus = Admin::where('id', $findadminstatus->created_by)->first();
                    if($findAccountanttatus->plan_status == "1")
                    {
                        return redirect('accountant-dashboard');
                    }
                    else{

                        return redirect()->back()->with('error_message', 'Accountant Your Owner Account   is Not Subscribed.Please Contant To School Principle');

                    }

                }
                
            } 
            else {
                return redirect()->back()->with('error_message', 'Invalid Email or Password');
            }
        }
        return view('admin.adminlogin');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect('/')->with('message', 'You are successfully Logout!');
    }
}
