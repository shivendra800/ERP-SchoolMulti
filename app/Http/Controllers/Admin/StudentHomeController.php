<?php

namespace App\Http\Controllers\Admin;

use App\Models\Unit;
use App\Models\Stream;
use App\Models\Section;
use App\Models\ExamType;
use App\Models\StudentFee;
use App\Models\StudentYear;
use App\Models\StudentMarks;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\AssignSubject;
use App\Models\ClassConfiger;
use App\Models\UploadContent;
use App\Models\DecideClassPeriod;
use App\Models\StudentAttendance;
use App\Models\AssignTecherSubject;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StudentHomeController extends Controller
{
    public function ContentSubjectwise()
    {
        
    $getassignstdata = AssignStudent::select('assign_students.class_id','assign_subjects.subject_id','subjects.subject_name')
                                            ->Join('assign_subjects','assign_subjects.class_id','assign_students.class_id')
                                            ->join('subjects','subjects.id','assign_subjects.subject_id')
                                          
                                            ->where('assign_students.school_id',Auth::guard('admin')->user()->school_id)
                                            ->where('assign_students.student_id',Auth::guard('admin')->user()->student_id)->get();
                                
   
    
        return view('admin.studenthomes.student_subject')->with(compact('getassignstdata'));
    }

    public function StudentSubjectwiseUnit($class_id,$subject_id)
    {
        $subjectwiseunitlist = Unit::with(['school_subject'])->where('assign_class_id',$class_id)->where('assign_subject_id',$subject_id)->where('school_id',Auth::guard('admin')->user()->school_id)->get()->toArray();
        return view('admin.studenthomes.student_subjectwise_unit')->with(compact('subjectwiseunitlist'));
    }

    public function StudentSubjectUnitContent($unit_id)
    {
        $subjectwiseunitlist = UploadContent::where('unit_id',$unit_id)->where('school_id',Auth::guard('admin')->user()->school_id)->get()->toArray();
        return view('admin.studenthomes.student_subjectwise_unit_content')->with(compact('subjectwiseunitlist'));
    }

    //student Attendance section ---------------------------------------------------------------
    public function AttendanceSubjectWise()
    {
        $getassignstdata = AssignStudent::select('assign_students.class_id','assign_subjects.subject_id','subjects.subject_name')
                                            ->Join('assign_subjects','assign_subjects.class_id','assign_students.class_id')
                                            ->join('subjects','subjects.id','assign_subjects.subject_id')                                          
                                            ->where('assign_students.school_id',Auth::guard('admin')->user()->school_id)
                                            ->where('assign_students.student_id',Auth::guard('admin')->user()->student_id)->get();
        return view('admin.studenthomes.student_attendance_subjectwise')->with(compact('getassignstdata'));
    }

    public function StudentSubjectwiseAttendance($class_id,$subject_id)
    {
        $subjectwiseAttendlist = StudentAttendance::with(['getstudent','getclass','getsubject','getteachername'])->where('class_id',$class_id)->where('subject_id',$subject_id)
        ->where('school_id',Auth::guard('admin')->user()->school_id)
        ->where('student_id',Auth::guard('admin')->user()->student_id)->get()->toArray();
        return view('admin.studenthomes.student_subjectwise_attendance')->with(compact('subjectwiseAttendlist'));
    }
    //student Exam Mark --------------------------------------------------------------------------------------
    public function ExamType()
    {
        $getexamtype = ExamType::where('school_id',Auth::guard('admin')->user()->school_id)->get();
        return view('admin.studenthomes.student_exam_type')->with(compact('getexamtype'));
    }
    public function markExamType($examid)
    {
        $getasssignclass = AssignStudent::where('school_id',Auth::guard('admin')->user()->school_id)->where('student_id',Auth::guard('admin')->user()->student_id)->first();
        $getmarkexamtype = StudentMarks::with(['examtype','subject','student_year'])->where('school_id',Auth::guard('admin')->user()->school_id)
        ->where('student_id',Auth::guard('admin')->user()->student_id)->where('class_id',$getasssignclass['class_id'])
        ->where('exam_type_id',$examid)
        ->get();
        return view('admin.studenthomes.student_mark_examtype')->with(compact('getmarkexamtype'));
    }

    public function StudentTimetableView()
    {
             $getassignstdata = AssignStudent::where('school_id',Auth::guard('admin')->user()->school_id)->where('student_id',Auth::guard('admin')->user()->student_id)->first();
        $getStudentassigndata = DecideClassPeriod::where('class_id',$getassignstdata['class_id'])->where('school_id',$getassignstdata['school_id'])->get();
       
        return view('admin.studenthomes.student_timetable')->with(compact('getStudentassigndata'));
    }

    public function StudentProfile()
    {
        $data['student_data'] = AssignStudent::with(['student','getschooldata','student_class','student_year','student_section','student_stream'])
                              ->where('school_id',Auth::guard('admin')->user()->school_id)->where('student_id',Auth::guard('admin')->user()->student_id)
                              ->first();
                            //   dd($data);
        return view('admin.studenthomes.student_profile',$data);
    }

    public function studentfeepaidlist()
    {
		$data['getstudentfeeReport'] = StudentFee::with('getmonth','getclass','getyear')->where('school_id',Auth::guard('admin')->user()->school_id)->where('student_id',Auth::guard('admin')->user()->student_id)->get()->toArray();

		return view('admin.studenthomes.student_fee_report_paid_list',$data);
	}
	public function studentfeepaidReceipt($feepaid_id)
	{
		$data['getstudentfeeReport'] = StudentFee::with('getmonth','getclass','getyear','student','getschooldata')
		->where('school_id',Auth::guard('admin')->user()->school_id)->where('id',$feepaid_id)->first();
		return view('admin.studenthomes.student_fee_report_paid_receipt',$data);
	}
    public function StudentResult($examid)
    {
        $getassigndata = AssignStudent::where('student_id',Auth::guard('admin')->user()->student_id)->first();
      
        $data['getstudentresult'] = StudentMarks::with(['student','student_class','student_year','subject','getsection','examtype'])->where('year_id',$getassigndata['year_id'])->where('exam_type_id',$examid)->where('school_id',Auth::guard('admin')->user()->school_id)->where('student_id',Auth::guard('admin')->user()->student_id)->first();
        $data['getstudentresultdata'] = StudentMarks::with(['student','student_class','student_year','subject'])->where('year_id',$getassigndata['year_id'])->where('exam_type_id',$examid)->where('school_id',Auth::guard('admin')->user()->school_id)->where('student_id',Auth::guard('admin')->user()->student_id)->get();

    
        $data['gettotalexammark'] = StudentMarks::where('year_id',$getassigndata['year_id'])->where('exam_type_id',$examid)->where('school_id',Auth::guard('admin')->user()->school_id)->where('student_id',Auth::guard('admin')->user()->student_id)->sum('totalsub_marks');	
        $data['gettotalstudentobtin'] = StudentMarks::where('year_id',$getassigndata['year_id'])->where('exam_type_id',$examid)->where('school_id',Auth::guard('admin')->user()->school_id)->where('student_id',Auth::guard('admin')->user()->student_id)->sum('marks');
        return view('admin.studenthomes.student_result',$data);
    }

}
