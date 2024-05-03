<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\Student;
use App\Models\SubscriptionPlanHistroy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SchoolRegistation;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function SchoolSubscription()
    {
        $admindata = Admin::where('type','Admin')->where('plan_status',1)->get();
        return view('admin.subscriptions.updated_school_subscription',compact('admindata'));
    }
    public function SchoolUnSubscription()
    {
        $admindata = Admin::where('type','Admin')->where('plan_status',0)->get();
        return view('admin.subscriptions.updated_school_subscription',compact('admindata'));
    }

    public function subcriptionlist($id)
    {
       
        $admindata = Admin::where('type','Admin')->where('id',$id)->first();
        $getschool = SchoolRegistation::where('admin_id',$id)->count();
        $getstudent = Student::where('admin_id',$id)->count();
        if($getstudent)
        {
         return view('admin.subscriptions.subscriptionplan',compact('admindata','getstudent','getschool'));
        }
        else{
         return redirect('/School-unSubscription')->with('error_message','You Can not take subscription of this type If You want to buy this type of subscription first add the student!');
        }
        
       
    }
    public function subscriptionsave(Request $request,$id)
    {
       if($request->isMethod('post')){
        $data= $request->all();
        $subplanhistroy = new SubscriptionPlanHistroy;
        $subplanhistroy->admin_id = $id;
        $subplanhistroy->total_price = $data['total_price'];
        $subplanhistroy->plan = $data['plan'];
        $subplanhistroy->per_std_price = $data['per_std_price'];
        $subplanhistroy->total_stud = $data['total_stud'];
        $subplanhistroy->plan_start_date = $data['plan_start_date'];
        $subplanhistroy->plan_end_date = $data['plan_end_date'];
        $subplanhistroy->payment_type = "Monthly Subscription";
        $subplanhistroy->save();

        $updateadmin = Admin::find($id);
        $updateadmin->plan = $data['plan'];
        $updateadmin->total_price = $data['total_price'];
        $updateadmin->plan_start_date = $data['plan_start_date'];
        $updateadmin->plan_end_date = $data['plan_end_date'];
        $updateadmin->payment_type = "Monthly Subscription";
        $updateadmin->plan_status = 1;
        $updateadmin->save();

        return redirect('School-Subscription')->with('success_message','Your Subscription Plan Is Actived For'.""."".$data['plan']. 'Months');
       }
    }

    public function subscriptionsavetwo(Request $request,$id)
    {
       if($request->isMethod('post')){
        $data= $request->all();
        $subplanhistroy = new SubscriptionPlanHistroy;
        $subplanhistroy->admin_id = $id;
        $subplanhistroy->total_price = $data['total_price'];
        $subplanhistroy->plan = $data['plan'];
        $subplanhistroy->per_std_price = $data['per_std_price'];
        $subplanhistroy->total_stud = $data['total_stud'];
        $subplanhistroy->plan_start_date = $data['plan_start_date'];
        $subplanhistroy->plan_end_date = $data['plan_end_date'];
        $subplanhistroy->payment_type = "Six Month Subscription";
        $subplanhistroy->save();

        $updateadmin = Admin::find($id);
        $updateadmin->plan = $data['plan'];
        $updateadmin->total_price = $data['total_price'];
        $updateadmin->plan_start_date = $data['plan_start_date'];
        $updateadmin->plan_end_date = $data['plan_end_date'];
        $updateadmin->payment_type = "Six Month Subscription";
        $updateadmin->plan_status = 1;
        $updateadmin->save();
        return redirect('School-Subscription')->with('success_message','Your Subscription Plan Is Actived For'.""."".$data['plan']. 'Months');
       }
    }
    public function subscriptionsavethree(Request $request,$id)
    {
       if($request->isMethod('post')){
        $data= $request->all();
        $subplanhistroy = new SubscriptionPlanHistroy;
        $subplanhistroy->admin_id = $id;
        $subplanhistroy->total_price = $data['total_price'];
        $subplanhistroy->plan = $data['plan'];
        $subplanhistroy->per_std_price = $data['per_std_price'];
        $subplanhistroy->total_stud = $data['total_stud'];
        $subplanhistroy->plan_start_date = $data['plan_start_date'];
        $subplanhistroy->plan_end_date = $data['plan_end_date'];
        $subplanhistroy->payment_type = "Yearly Subscription";
        $subplanhistroy->save();

        $updateadmin = Admin::find($id);
        $updateadmin->plan = $data['plan'];
        $updateadmin->total_price = $data['total_price'];
        $updateadmin->plan_start_date = $data['plan_start_date'];
        $updateadmin->plan_end_date = $data['plan_end_date'];
        $updateadmin->payment_type = "Yearly Subscription";
        $updateadmin->plan_status = 1;
        $updateadmin->save();
        return redirect('School-Subscription')->with('success_message','Your Subscription Plan Is Actived For'.""."".$data['plan']. 'Months');
       }
    }

    public function FixPaymentSubscription($id)
    {
         $getstudent = Student::where('admin_id',$id)->count();
         $getschool = SchoolRegistation::where('admin_id',$id)->count();
        $admindata = Admin::where('type','Admin')->where('id',$id)->first();
        if($admindata->one_month_fix_price && $admindata->six_month_fix_price && $admindata->yearly_fix_price)
        {
         return view('admin.subscriptions.fixpaymentsubscriptionplan',compact('admindata','getstudent','getschool'));
        }
        else{
         return redirect('/School-unSubscription')->with('error_message','You Can not take subscription of this type If You want to buy this type of subscription first go to the School Admin Owner Menu and find the paticular School and add the plan Price!');
        }

       
    }
    public function fixsubscriptionsave(Request $request,$id)
    {
       if($request->isMethod('post')){
        $data= $request->all();
        $subplanhistroy = new SubscriptionPlanHistroy;
        $subplanhistroy->admin_id = $id;
        $subplanhistroy->total_price = $data['total_price'];
        $subplanhistroy->plan = $data['plan'];
        $subplanhistroy->per_std_price = $data['per_std_price'];
        $subplanhistroy->total_stud = $data['total_stud'];
        $subplanhistroy->plan_start_date = $data['plan_start_date'];
        $subplanhistroy->plan_end_date = $data['plan_end_date'];
        $subplanhistroy->payment_type = " Fix Payment Of Three Month";
        $subplanhistroy->save();

        $updateadmin = Admin::find($id);
        $updateadmin->plan = $data['plan'];
        $updateadmin->total_price = $data['total_price'];
        $updateadmin->plan_start_date = $data['plan_start_date'];
        $updateadmin->plan_end_date = $data['plan_end_date'];
        $updateadmin->payment_type = "Fix Payment Of Three Month";
        $updateadmin->plan_status = 1;
        $updateadmin->save();
        return redirect('School-Subscription')->with('success_message','Your Subscription Plan Is Actived For'.""."".$data['plan']. 'Months');
       }
    }
    public function fixsubscriptionsavetwo(Request $request,$id)
    {
       if($request->isMethod('post')){
        $data= $request->all();
        $subplanhistroy = new SubscriptionPlanHistroy;
        $subplanhistroy->admin_id = $id;
        $subplanhistroy->total_price = $data['total_price'];
        $subplanhistroy->plan = $data['plan'];
        $subplanhistroy->per_std_price = $data['per_std_price'];
        $subplanhistroy->total_stud = $data['total_stud'];
        $subplanhistroy->plan_start_date = $data['plan_start_date'];
        $subplanhistroy->plan_end_date = $data['plan_end_date'];
        $subplanhistroy->payment_type = "Fix Payment Of Six Month";
        $subplanhistroy->save();

        $updateadmin = Admin::find($id);
        $updateadmin->plan = $data['plan'];
        $updateadmin->total_price = $data['total_price'];
        $updateadmin->plan_start_date = $data['plan_start_date'];
        $updateadmin->plan_end_date = $data['plan_end_date'];
        $updateadmin->payment_type = "Fix Payment Of Six Month";
        $updateadmin->plan_status = 1;
        $updateadmin->save();
        return redirect('School-Subscription')->with('success_message','Your Subscription Plan Is Actived For'.""."".$data['plan']. 'Months');
       }
    }
    public function fixsubscriptionsavethree(Request $request,$id)
    {
       if($request->isMethod('post')){
        $data= $request->all();
        $subplanhistroy = new SubscriptionPlanHistroy;
        $subplanhistroy->admin_id = $id;
        $subplanhistroy->total_price = $data['total_price'];
        $subplanhistroy->plan = $data['plan'];
        $subplanhistroy->per_std_price = $data['per_std_price'];
        $subplanhistroy->total_stud = $data['total_stud'];
        $subplanhistroy->plan_start_date = $data['plan_start_date'];
        $subplanhistroy->plan_end_date = $data['plan_end_date'];
        $subplanhistroy->payment_type = "Fix Payment Of  Yearly";
        $subplanhistroy->save();

        $updateadmin = Admin::find($id);
        $updateadmin->plan = $data['plan'];
        $updateadmin->total_price = $data['total_price'];
        $updateadmin->plan_start_date = $data['plan_start_date'];
        $updateadmin->plan_end_date = $data['plan_end_date'];
        $updateadmin->payment_type = "Fix Payment Of  Yearly";
        $updateadmin->plan_status = 1;
        $updateadmin->save();
        return redirect('School-Subscription')->with('success_message','Your Subscription Plan Is Actived For'.""."".$data['plan']. 'Months');
       }
    }
}
