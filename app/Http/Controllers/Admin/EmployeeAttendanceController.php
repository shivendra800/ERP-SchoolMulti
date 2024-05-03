<?php

namespace App\Http\Controllers\Admin;

use App\Models\Staff;
use Illuminate\Http\Request;
use App\Models\MonthwiseSalary;
use App\Models\EmployeeAttendance;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EmployeeAttendanceController extends Controller
{
    public function AttendanceView(){
        $data['allData'] = EmployeeAttendance::select('date')->where('school_id',Auth::guard('admin')->user()->id)->groupBy('date')->orderBy('id','DESC')->get();
    	return view('admin.staff.employee_attendance_view',$data);
    }


    public function AttendanceAdd(){
    	$data['employees'] = Staff::where('school_id',Auth::guard('admin')->user()->id)->where('status',1)->get();
    	return view('admin.staff.employee_attendance_add',$data);

    }


    public function AttendanceStore(Request $request){

    	EmployeeAttendance::where('date', date('Y-m-d', strtotime($request->date)))->delete();
    	$countemployee = count($request->employee_id);
    	for ($i=0; $i <$countemployee ; $i++) { 
    		$attend_status = 'attend_status'.$i;
    		$attend = new EmployeeAttendance();
    		$attend->date = date('Y-m-d',strtotime($request->date));
    		$attend->staff_id = $request->employee_id[$i];
    		$attend->attend_status = $request->$attend_status;
            $attend->admin_id = Auth::guard('admin')->user()->created_by;
            $attend->school_id = Auth::guard('admin')->user()->id;
    		$attend->save();
    	} // end For Loop

 		$notification = array(
    		'message' => 'Employee Attendace Data Update Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect('attendance/employee/view')->with($notification);

    } // end Method



    public function AttendanceEdit($date){
    	$data['editData'] = EmployeeAttendance::where('date',$date)->where('school_id',Auth::guard('admin')->user()->id)->get();
    	$data['employees'] = Staff::where('status',1)->get();
    	return view('admin.staff.employee_attendance_edit',$data);
    }


    public function AttendanceDetails($date){
    	$data['details'] = EmployeeAttendance::where('date',$date)->where('school_id',Auth::guard('admin')->user()->id)->get();
    	return view('admin.staff.employee_attendance_details',$data);

    }


	public function teacherAttendance()
	{
		$data['details'] = EmployeeAttendance::where('staff_id',Auth::guard('admin')->user()->staff_id)->where('school_id',Auth::guard('admin')->user()->school_id)->latest()->get();
    	return view('admin.staff.employee_attendance_details',$data);
	}


	public function salaryteacher()
	{
		$mwshistory = MonthwiseSalary::where('staff_id',Auth::guard('admin')->user()->staff_id)->where('school_id',Auth::guard('admin')->user()->school_id)->latest()->get();
        return view('admin.staff.month_wise_salary_histroy')->with(compact('mwshistory'));
	}

}
