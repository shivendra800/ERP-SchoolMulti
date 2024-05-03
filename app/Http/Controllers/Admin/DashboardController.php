<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Admin;
use App\Models\Staff;
use App\Models\Student;
use App\Models\StudentFee;
use App\Models\StudentYear;
use Illuminate\Http\Request;
use App\Models\MonthwiseSalary;
use App\Models\DecideClassPeriod;
use App\Models\EmployeeAttendance;
use Illuminate\Support\Facades\DB;
use App\Models\SalaryCongiguration;
use App\Http\Controllers\Controller;
use App\Models\SubscriptionPlanHistroy;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $todayDate = Carbon::now()->format('Y-m-d');
        $thisMonth = Carbon::now()->format('m');
        $thisYear = Carbon::now()->format('Y');

        $data['admindata'] = Admin::where('type','Admin')->get();

        $data['totalprice'] = SubscriptionPlanHistroy::sum('total_price');

        $data['totalpricetoday'] = SubscriptionPlanHistroy::whereDate('created_at',$todayDate)->sum('total_price');
        $data['totalpricemonth'] = SubscriptionPlanHistroy::whereMonth('created_at',$thisMonth)->whereYear('created_at', $thisYear)->sum('total_price');
        $data['totalpriceyear'] = SubscriptionPlanHistroy:: whereYear('created_at', $thisYear)->sum('total_price');

        return view('admin.dashboard',$data);
    }

    public function SchoolAdminDashboard()
    {

        $todayDate = Carbon::now()->format('Y-m-d');
        $thisMonth = Carbon::now()->format('m');
        $thisYear = Carbon::now()->format('Y');
        
        $studentcount = Student::select(DB::raw("COUNT(*) as count"), DB::raw("YEAR(s_addmission_date) as year"))
        ->where('school_id', Auth::guard('admin')->user()->id)
        ->where('admin_id', Auth::guard('admin')->user()->created_by)
        ->groupBy(DB::raw("YEAR(s_addmission_date)"))
        ->pluck('count', 'year');

        $labels = $studentcount->keys();
        $data = $studentcount->values();


        $studentfee = StudentFee::select(DB::raw('SUM(total_fee_amount) as total_fee_amount'), DB::raw("YEAR(created_at) as year"))
     
        ->where('school_id', Auth::guard('admin')->user()->id)
        ->where('admin_id', Auth::guard('admin')->user()->created_by)
         
        ->groupBy(DB::raw("YEAR(created_at)"))
    
        ->pluck('total_fee_amount', 'year');

        $feelabels = $studentfee->keys();
        $feedata = $studentfee->values();

        $year = StudentYear::where('school_id',Auth::guard('admin')->user()->id)->get();

         $staffcount = Staff::where('status',1)->where('school_id', Auth::guard('admin')->user()->id)->where('admin_id', Auth::guard('admin')->user()->created_by)->count();
           $getstudentfee = StudentFee::where('school_id', Auth::guard('admin')->user()->id)->where('admin_id', Auth::guard('admin')->user()->created_by)->limit(5)->latest()->get();
            $getstaffsalary = MonthwiseSalary::where('school_id', Auth::guard('admin')->user()->id)->where('admin_id', Auth::guard('admin')->user()->created_by)->limit(5)->latest()->get();

           $staffpresttodaycount = EmployeeAttendance::where('attend_status','Present')->whereDate('created_at',$todayDate)->where('school_id', Auth::guard('admin')->user()->id)->where('admin_id', Auth::guard('admin')->user()->created_by)->count();
           $staffLeavetodaycount = EmployeeAttendance::where('attend_status','Leave')->whereDate('created_at',$todayDate)->where('school_id', Auth::guard('admin')->user()->id)->where('admin_id', Auth::guard('admin')->user()->created_by)->count();
           $staffAbsenttodaycount = EmployeeAttendance::where('attend_status','Absent')->whereDate('created_at',$todayDate)->where('school_id', Auth::guard('admin')->user()->id)->where('admin_id', Auth::guard('admin')->user()->created_by)->count();
         
         
           return view('admin.layouts.school_admin_dashboard')->with(compact('labels', 'data','feelabels',
              'feedata','year','staffcount','getstaffsalary','getstudentfee','staffpresttodaycount',
            'staffLeavetodaycount','staffAbsenttodaycount'));
       
    }

    public function TeacherDashboard()
    {
        $getstaffdata = Staff::where('id',Auth::guard('admin')->user()->staff_id)->first();
         $gettimetsbledataclass = DecideClassPeriod::where('teacher_id',Auth::guard('admin')->user()->staff_id)->where('year_id',$getstaffdata['year_id'])
         ->where('week_days',1)
         ->where('school_id', Auth::guard('admin')->user()->school_id)->orderby('class_period')->get();
         $gettimetsbledataclass2 = DecideClassPeriod::where('teacher_id',Auth::guard('admin')->user()->staff_id)->where('year_id',$getstaffdata['year_id'])
         ->where('week_days',2)
         ->where('school_id', Auth::guard('admin')->user()->school_id)->orderby('class_period')->get();
         $gettimetsbledataclass3 = DecideClassPeriod::where('teacher_id',Auth::guard('admin')->user()->staff_id)->where('year_id',$getstaffdata['year_id'])
         ->where('week_days',3)
         ->where('school_id', Auth::guard('admin')->user()->school_id)->orderby('class_period')->get();
         $gettimetsbledataclass4 = DecideClassPeriod::where('teacher_id',Auth::guard('admin')->user()->staff_id)->where('year_id',$getstaffdata['year_id'])
         ->where('week_days',4)
         ->where('school_id', Auth::guard('admin')->user()->school_id)->orderby('class_period')->get();
         $gettimetsbledataclass5 = DecideClassPeriod::where('teacher_id',Auth::guard('admin')->user()->staff_id)->where('year_id',$getstaffdata['year_id'])
         ->where('week_days',5)
         ->where('school_id', Auth::guard('admin')->user()->school_id)->orderby('class_period')->get();
         $gettimetsbledataclass6 = DecideClassPeriod::where('teacher_id',Auth::guard('admin')->user()->staff_id)->where('year_id',$getstaffdata['year_id'])
         ->where('week_days',6)
         ->where('school_id', Auth::guard('admin')->user()->school_id)->orderby('class_period')->get();
         $gettimetsbledataclass7 = DecideClassPeriod::where('teacher_id',Auth::guard('admin')->user()->staff_id)->where('year_id',$getstaffdata['year_id'])
         ->where('week_days',7)
         ->where('school_id', Auth::guard('admin')->user()->school_id)->orderby('class_period')->get();


         $todayDate = Carbon::now()->format('Y-m-d');
         $thisMonth = Carbon::now()->format('m');
         $thisYear = Carbon::now()->format('Y');

         $staffpresttodaycount = EmployeeAttendance::where('attend_status','Present')->whereMonth('date',$thisMonth)->whereYear('date', $thisYear)->where('staff_id',Auth::guard('admin')->user()->staff_id)->where('school_id', Auth::guard('admin')->user()->school_id)->count();
         $staffLeavetodaycount = EmployeeAttendance::where('attend_status','Leave')->whereMonth('date',$thisMonth)->whereYear('date', $thisYear)->where('staff_id',Auth::guard('admin')->user()->staff_id)->where('school_id', Auth::guard('admin')->user()->school_id)->count();
         $staffAbsenttodaycount = EmployeeAttendance::where('attend_status','Absent')->whereMonth('date',$thisMonth)->whereYear('date', $thisYear)->where('staff_id',Auth::guard('admin')->user()->staff_id)->where('school_id', Auth::guard('admin')->user()->school_id)->count();
       
       
         return view('admin.layouts.teacher_dashboard',compact('gettimetsbledataclass','gettimetsbledataclass2','gettimetsbledataclass3',
           'gettimetsbledataclass4','gettimetsbledataclass5','gettimetsbledataclass6','gettimetsbledataclass7',
            'staffpresttodaycount','staffLeavetodaycount','staffAbsenttodaycount'));
    }
    public function StudentDashboard()
    {
        return view('admin.layouts.student_dashboard');
    }
    public function AccountantDashboard()
    {
        return view('admin.layouts.accountant_dashboard');
    }
}
