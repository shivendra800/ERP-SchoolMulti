<?php

namespace App\Http\Controllers\Admin;

use App\Models\Staff;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\AssignSubject;
use App\Models\ClassConfiger;
use App\Models\StudentAttendance;
use App\Http\Controllers\Controller;
use App\Models\AssignTecherSubject;
use Illuminate\Support\Facades\Auth;

class StudentAttendanceController extends Controller
{
    public function Classlist()
    {
        // $data['classes'] = ClassConfiger::where('school_id',Auth::guard('admin')->user()->school_id)->get();
         $data['classes'] = AssignTecherSubject::with('student_class')->where('school_id',Auth::guard('admin')->user()->school_id)->where('teacher_id',Auth::guard('admin')->user()->staff_id)->get();
        
       
        return view('admin.student.class_list',$data);
    }
    public function StudentAttendanceAdd($id){
    	$data['students'] = Student::where('school_id',Auth::guard('admin')->user()->school_id)->where('class',$id)->where('status',1)->get();
        $data['subjectes'] = AssignTecherSubject::where('school_id',Auth::guard('admin')->user()->school_id)->where('teacher_id',Auth::guard('admin')->user()->staff_id)->where('class_id',$id)->get();
        $data['sectiones'] = Section::where('school_id',Auth::guard('admin')->user()->school_id)->get();
    	return view('admin.student.student_attendance_add',$data);

    }


    public function StudentAttendanceStore(Request $request){
        $getadmin_id = Staff::where('id',Auth::guard('admin')->user()->staff_id)->first();
    	$countstudent = count($request->student_id);
    	for ($i=0; $i <$countstudent ; $i++) { 
    		$attend_status = 'attend_status'.$i;
    		$attend = new StudentAttendance();
    		$attend->date = date('Y-m-d',strtotime($request->date));
            $attend->class_id = $request->class_id;
            $attend->subject_id = $request->subject_id;
            $attend->section_id = $request->section_id;
            $attend->class_start_time = $request->class_start_time;
            $attend->class_end_time = $request->class_end_time;
    		$attend->student_id = $request->student_id[$i];
    		$attend->attend_status = $request->$attend_status;
            $attend->admin_id = $getadmin_id['admin_id'];
            $attend->school_id = Auth::guard('admin')->user()->school_id;
            $attend->staff_id = Auth::guard('admin')->user()->id;
    		$attend->save();
    	} // end For Loop

 		$notification = array(
    		'message' => 'Class Wise Student  Attendace Data Update Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect('Class-Wise-Student-Attendance')->with($notification);

    } // end Method

    public function StudentAttendanceClassWise(){
        $data['allData'] = StudentAttendance::select('date','id','class_id','subject_id','section_id')->where('school_id',Auth::guard('admin')->user()->school_id)->where('staff_id',Auth::guard('admin')->user()->id)->orderBy('id','DESC')->get();
       return view('admin.student.student_attendance_view',$data);
   }

   public function StudentAttendanceDetails($id){
    $data['details'] = StudentAttendance::where('id',$id)->where('school_id',Auth::guard('admin')->user()->school_id)->where('staff_id',Auth::guard('admin')->user()->id)->get();
    return view('admin.student.student_attendance_details',$data);
   }

   public function StudentAttendanceEdit($id){
    $data['editData'] = StudentAttendance::where('id',$id)->where('school_id',Auth::guard('admin')->user()->school_id)->where('staff_id',Auth::guard('admin')->user()->id)->get();
    $data['student'] = Student::where('school_id',Auth::guard('admin')->user()->school_id)->get();
    return view('admin.student.student_attendance_edit',$data);
    }

    
    public function StudentAttendanceEditStore(Request $request,$id){
        StudentAttendance::where('id', $id)->delete();
        $getadmin_id = Staff::where('id',Auth::guard('admin')->user()->staff_id)->first();
    	$countstudent = count($request->student_id);
    	for ($i=0; $i <$countstudent ; $i++) { 
    		$attend_status = 'attend_status'.$i;
    		$attend = new StudentAttendance();
    		$attend->date = date('Y-m-d',strtotime($request->date));
            $attend->class_id = $request->class_id;
            $attend->subject_id = $request->subject_id;
            $attend->section_id = $request->section_id;
            $attend->class_start_time = $request->class_start_time;
            $attend->class_end_time = $request->class_end_time;
    		$attend->student_id = $request->student_id[$i];
    		$attend->attend_status = $request->$attend_status;
            $attend->admin_id = $getadmin_id['admin_id'];
            $attend->school_id = Auth::guard('admin')->user()->school_id;
            $attend->staff_id = Auth::guard('admin')->user()->id;
    		$attend->save();
    	} // end For Loop

 		$notification = array(
    		'message' => 'Class Wise Student  Attendace Data Update Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect('Class-Wise-Student-Attendance')->with($notification);

    } // end Method

    

}
