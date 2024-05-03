<?php

namespace App\Http\Controllers\Admin;

use PDF;
use Carbon\Carbon;
use App\Models\Admin;
 
use App\Models\Leave;
 
use App\Models\Staff;
use App\Models\StudentFee;
 
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\MonthwiseSalary;
use App\Models\StudentAttendance;
use App\Models\EmployeeAttendance;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\SubscriptionPlanHistroy;

class MainOwnerController extends Controller
{

    public function Dashboard()
    {
        $getschoollist = Admin::with('getschooldat')->where('type','School-Admin')->where('created_by',Auth::guard('admin')->user()->id)->paginate(4);
        $dataalllist = SubscriptionPlanHistroy::where('admin_id',Auth::guard('admin')->user()->id)->latest()->get();
        return view('admin.schoolowners.school_owner_dashboard')->with(compact('getschoollist','dataalllist'));
    }
    public function AllDataSchool($school_id)
    {
        $data['getschollid'] = Admin::where('id',$school_id)->where('created_by',Auth::guard('admin')->user()->id)->first();
        $data['getteachercount'] = Staff::where('school_id',$school_id)->where('admin_id',Auth::guard('admin')->user()->id)->count();

       
        $todayDate = Carbon::now()->format('Y-m-d');
        $thisMonth = Carbon::now()->format('m');
        $thisYear = Carbon::now()->format('Y'); 
       // fee collection of student
        $data['overallfeecollection'] = StudentFee::where('school_id',$school_id)->where('admin_id',Auth::guard('admin')->user()->id)->sum('total_fee_amount');
        $data['thismonthfeecollection'] = StudentFee::where('school_id',$school_id)->where('admin_id',Auth::guard('admin')->user()->id)->whereMonth('created_at',$thisMonth)->whereYear('created_at',$thisYear)->sum('total_fee_amount');
        $data['thisyearfeecollection'] = StudentFee::where('school_id',$school_id)->where('admin_id',Auth::guard('admin')->user()->id)->whereYear('created_at', $thisYear)->sum('total_fee_amount');
       // end fee collection

        $data['overallsalarycollection'] = MonthwiseSalary::where('school_id',$school_id)->where('admin_id',Auth::guard('admin')->user()->id)->sum('total_paid');
        $data['thismonthsalarycollection'] = MonthwiseSalary::where('school_id',$school_id)->where('admin_id',Auth::guard('admin')->user()->id)->whereMonth('created_at',$thisMonth)->whereYear('created_at',$thisYear)->sum('total_paid');
        $data['thisyearsalarycollection'] = MonthwiseSalary::where('school_id',$school_id)->where('admin_id',Auth::guard('admin')->user()->id)->whereYear('created_at', $thisYear)->sum('total_paid');


      
       return view('admin.schoolowners.all_data_school',$data);
    }

    public function GetSchoolWiseStudent($school_id)
    {
        $data['allData'] = AssignStudent::with(['student'])->where('school_id',$school_id)->where('admin_id',Auth::guard('admin')->user()->id)->get();
        
        return view('admin.schoolowners.get_school_student',$data);
    }



    public function Getstudentfeereportlist($school_id,$std_id)
    {
        $data['getstudentfeeReport'] = StudentFee::with('getmonth','getclass','getyear')
                 ->where('school_id',$school_id)
                 ->where('student_id',$std_id)
                 ->where('admin_id',Auth::guard('admin')->user()->id)
                 ->get()->toArray();

		return view('admin.student_reg.student_fee_report_paid_list',$data);
    }
    public function Getstudentleavelist($school_id,$std_id)
    {
        $data['stdleavelist'] = Leave::with('student_data','class_data','section_data','stream_data')
                 ->where('school_id',$school_id)
                 ->where('student_id',$std_id)
                 ->where('admin_id',Auth::guard('admin')->user()->id)
                 ->get()->toArray();

		return view('admin.schoolowners.get_school_student_leave',$data);
    }

    public function Getstudentattendacelist($school_id,$std_id)
    {
        $data['stdattedancelist'] = StudentAttendance::with(['getclass','getsection','getstudent','getschooldata'])
        ->where('school_id',$school_id)
        ->where('student_id',$std_id)
        ->where('admin_id',Auth::guard('admin')->user()->id)
        ->get()->toArray();

       

        $studentattendance = StudentAttendance::with(['getclass','getsection','getstudent','getschooldata'])->where('student_id',$std_id)->where('school_id',$school_id)->get();

        if ($studentattendance == true) {
            $data['allData'] = StudentAttendance::with(['getstudent','getclass','getsection','getschooldata'])->where('school_id',$school_id)->where('student_id',$std_id)->get();
           
            $data['absents'] = StudentAttendance::where('attend_status', 'Absent')->where('school_id',$school_id)->where('student_id',$std_id)->get()->count();

            $data['leaves'] = StudentAttendance::where('attend_status', 'Leave')->where('school_id',$school_id)->where('student_id',$std_id)->get()->count();

           
            $pdf = PDF::loadView('admin.schoolowners.get_school_student_attendance_pdf', $data);
          
            return $pdf->stream('document.pdf');
    }
    }

    public function GetOverAllFeeReport($school_id)
    {
        // fee collection of student

        $data['overallfeecollection'] = StudentFee::with('getmonth','getclass','getyear','student')->where('school_id',$school_id)->where('admin_id',Auth::guard('admin')->user()->id)->get();



        // end fee collection
       return view('admin.schoolowners.overallfeecollection',$data);
    }
    public function GetMonthwiseFeeReport($school_id)
    {
        // fee collection of student
        $thisyear = Carbon::now()->format('Y');
        $thisMonth = Carbon::now()->format('m');
        

        $data['thismonthfeecollection'] = StudentFee::with('getmonth','getclass','getyear','student')->where('school_id',$school_id)->where('admin_id',Auth::guard('admin')->user()->id)->whereMonth('created_at',$thisMonth)->whereYear('created_at',$thisyear)->get();



        // end fee collection
       return view('admin.schoolowners.thismonthfeecollection',$data);
    }
    public function GetYearWiseFeeReport($school_id)
    {
        // fee collection of student
        $thisYear = Carbon::now()->format('Y'); 


        $data['thisyearfeecollection'] = StudentFee::with('getmonth','getclass','getyear','student')->where('school_id',$school_id)->where('admin_id',Auth::guard('admin')->user()->id)->whereYear('created_at', $thisYear)->get();


        // end fee collection
       return view('admin.schoolowners.thisyearfeecollection',$data);


    }

    // tearcher-----------------------------------------------------------------------------------------------------
    public function GetSchoolWiseTeacher($school_id)
    {
        $data['getteacherall'] = Staff::where('school_id',$school_id)->where('admin_id',Auth::guard('admin')->user()->id)->get();
    

        return view('admin.schoolowners.get_school_teacher',$data);
    }

    public function GetSchoolWiseTeacherLeave($school_id,$teacherid)
    {
        $data['teacherleavelist'] = Leave::with(['staff_data'])->where('school_id',$school_id)
                 ->where('staff_id',$teacherid)
                 ->where('admin_id',Auth::guard('admin')->user()->id)
                 ->get();
        return view('admin.schoolowners.get_school_teacherleave',$data);
    }
    public function GetSchoolWiseTeacherAttendance($school_id,$teacherid)
    {

        $data['teachattedancelist'] = EmployeeAttendance::with(['getstaff','getschooldata'])
        ->where('school_id',$school_id)
        ->where('staff_id',$teacherid)
        ->where('admin_id',Auth::guard('admin')->user()->id)
        ->get();

       

        $employeeAttendance = EmployeeAttendance::with(['getstaff','getschooldata'])->where('staff_id',$teacherid)->where('school_id',$school_id)->get();

        if ($employeeAttendance == true) {
            $data['allData'] = EmployeeAttendance::with(['getstaff','getschooldata'])->where('school_id',$school_id)->where('staff_id',$teacherid)->get();
           
            $data['absents'] = EmployeeAttendance::where('attend_status', 'Absent')->where('school_id',$school_id)->where('staff_id',$teacherid)->get()->count();

            $data['leaves'] = EmployeeAttendance::where('attend_status', 'Leave')->where('school_id',$school_id)->where('staff_id',$teacherid)->get()->count();

           
            $pdf = PDF::loadView('admin.schoolowners.get_school_teacherattendance_pdf', $data);
          
            return $pdf->stream('document.pdf');
    }
       
    }
    public function GetSchoolWiseTeacherSalary($school_id,$teacherid)
    {
        $mwshistory = MonthwiseSalary::where('school_id', $school_id)->where('staff_id', $teacherid)->where('admin_id',Auth::guard('admin')->user()->id)->get();
        return view('admin.schoolowners.get_school_teachmonthwisesalaryhistroy')->with(compact('mwshistory'));
    }
    public function GetOverAllsalaryReport($school_id)
    {
        $data['overallsalarycollection'] = MonthwiseSalary::with(['staffdetails'])->where('school_id',$school_id)->where('admin_id',Auth::guard('admin')->user()->id)->get();
       
       return view('admin.schoolowners.overallsalarycollection',$data);
    }
    public function GetMonthwisesalaryReport($school_id)
    {
        $thisyear = Carbon::now()->format('Y');
        $thisMonth = Carbon::now()->format('m');
        $data['thismonthsalarycollection'] = MonthwiseSalary::with(['staffdetails'])->where('school_id',$school_id)->where('admin_id',Auth::guard('admin')->user()->id)->whereMonth('created_at',$thisMonth)->whereYear('created_at',$thisyear)->get();

       return view('admin.schoolowners.thismonthsalarycollection',$data);
    }
    public function GetYearWisesalaryReport($school_id)
    {
       
        $thisYear = Carbon::now()->format('Y'); 
        $data['thisyearsalarycollection'] = MonthwiseSalary::with(['staffdetails'])->where('school_id',$school_id)->where('admin_id',Auth::guard('admin')->user()->id)->whereYear('created_at', $thisYear)->get();
        return view('admin.schoolowners.thisyearsalarycollection',$data);


    }
}
