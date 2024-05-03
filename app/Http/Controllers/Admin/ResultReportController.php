<?php

namespace App\Http\Controllers\Admin;

use PDF;
 
use App\Models\ExamType;
use App\Models\StudentYear;
use App\Models\StudentMarks;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\ClassConfiger;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ResultReportController extends Controller
{
    public function ResultView(){
    	$data['years'] = StudentYear::where('school_id',Auth::guard('admin')->user()->id)->get();
    	$data['classes'] = ClassConfiger::where('school_id',Auth::guard('admin')->user()->id)->get();
    	$data['exam_type'] = ExamType::where('school_id',Auth::guard('admin')->user()->id)->get();
    	return view('admin.student_result.student_result_view',$data);

    }


    public function ResultGet(Request $request){

    	$year_id = $request->year_id;
    	$class_id = $request->class_id;
    	$exam_type_id = $request->exam_type_id;

    	$singleResult = StudentMarks::where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->where('school_id',Auth::guard('admin')->user()->id)->first();

    if ($singleResult == true) {
    	$data['allData'] = StudentMarks::select('year_id','class_id','exam_type_id','student_id')->where('year_id',$year_id)->where('class_id',$class_id)->where('school_id',Auth::guard('admin')->user()->id)->where('exam_type_id',$exam_type_id)->groupBy('year_id')->groupBy('class_id')->groupBy('exam_type_id')->groupBy('student_id')->get();
    	// dd($data['allData']->toArray());

    $pdf = PDF::loadView('admin.student_result.student_result_pdf', $data);
	$pdf->SetProtection(['copy', 'print'], '', 'pass');
	return $pdf->stream('document.pdf');

    }else{
    	$notification = array(
    		'message' => 'Sorry These Criteria Does not match',
    		'alert-type' => 'error'
    	);

    	return redirect()->back()->with($notification);
      }
    } // end Method 



    public function IdcardView(){
    	$data['years'] = StudentYear::where('school_id',Auth::guard('admin')->user()->id)->get();
    	$data['classes'] = ClassConfiger::where('school_id',Auth::guard('admin')->user()->id)->get();
    	return view('admin.idcard.idcard_view',$data);
    }


    public function IdcardGet(Request $request){
    	$year_id = $request->year_id;
    	$class_id = $request->class_id;

    	$check_data = AssignStudent::where('year_id',$year_id)->where('class_id',$class_id)->where('school_id',Auth::guard('admin')->user()->id)->first();

    if ($check_data == true) {
        $data['details'] = AssignStudent::with(['student','getschooldata'])->where('year_id',$year_id)->where('class_id',$class_id)->where('school_id',Auth::guard('admin')->user()->id)->first();

    	$data['allData'] = AssignStudent::with(['student','getschooldata'])->where('year_id',$year_id)->where('class_id',$class_id)->where('school_id',Auth::guard('admin')->user()->id)->get();
    	// dd($data['allData']->toArray());

    $pdf = PDF::loadView('admin.idcard.idcard_pdf', $data);
	// $pdf->SetProtection(['copy', 'print'], '', 'pass');
	return $pdf->stream('document.pdf');

    }else{

    	$notification = array(
    		'message' => 'Sorry These Criteria Does not match',
    		'alert-type' => 'error'
    	);

    	return redirect()->back()->with($notification);

    }


    }// end method 

}
