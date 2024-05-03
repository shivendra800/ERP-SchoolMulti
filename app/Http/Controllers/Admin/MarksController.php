<?php

namespace App\Http\Controllers\Admin;

use App\Models\Stream;
use App\Models\Section;
use App\Models\ExamType;
use App\Models\StudentYear;
use App\Models\StudentMarks;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\AssignSubject;
use App\Models\ClassConfiger;
use Illuminate\Support\Facades\DB;
use App\Models\AssignTecherSubject;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MarksController extends Controller
{
    public function MarksAdd(){
		// return Auth::guard('admin')->user()->type;
		if(Auth::guard('admin')->user()->type == "Teacher")
		{
			$data['years'] = StudentYear::where('school_id',Auth::guard('admin')->user()->school_id)->get();			
			$data['classes'] = AssignTecherSubject::with(['student_class'])->where('school_id',Auth::guard('admin')->user()->school_id)->where('teacher_id',Auth::guard('admin')->user()->staff_id)->groupBy('class_id')->get();
			$data['exam_types'] = ExamType::where('school_id',Auth::guard('admin')->user()->school_id)->get();
			$data['getsection'] = Section::where('school_id', Auth::guard('admin')->user()->school_id)->get();
			$data['getstreamas'] = Stream::where('school_id', Auth::guard('admin')->user()->school_id)->get();

		}else{
			$data['years'] = StudentYear::where('school_id',Auth::guard('admin')->user()->id)->get();
			$data['classes'] = ClassConfiger::where('school_id',Auth::guard('admin')->user()->id)->get();
			$data['exam_types'] = ExamType::where('school_id',Auth::guard('admin')->user()->id)->get();
			$data['getsection'] = Section::where('school_id', Auth::guard('admin')->user()->id)->get();
			$data['getstreamas'] = Stream::where('school_id', Auth::guard('admin')->user()->id)->get();
		}
		 

    	

    	return view('admin.marks.marks_add',$data);

    }


    public function MarksStore(Request $request){
		DB::beginTransaction();   
		if(Auth::guard('admin')->user()->type == "Teacher")
		{

	     StudentMarks::where('year_id',$request->year_id)->where('teacher_id',Auth::guard('admin')->user()->staff_id)->where('Section_id',$request->Section_id)->where('stream_id',$request->stream_id)->where('class_id',$request->class_id)->where('assign_subject_id',$request->assign_subject_id)->where('exam_type_id',$request->exam_type_id)->where('school_id',Auth::guard('admin')->user()->school_id)->delete();
		}else{
			StudentMarks::where('year_id',$request->year_id)->where('class_id',$request->class_id)->where('assign_subject_id',$request->assign_subject_id)->where('exam_type_id',$request->exam_type_id)->where('school_id',Auth::guard('admin')->user()->id)->delete();
		}
		//  return $request->all();
    	$studentcount = $request->student_id;
    	if ($studentcount) {
    		for ($i=0; $i <count($request->student_id) ; $i++) { 
				
					$data = New StudentMarks();
					$data->year_id = $request->year_id;
					$data->class_id = $request->class_id;
					$data->assign_subject_id = $request->assign_subject_id;
					$data->stream_id = $request->stream_id;
					$data->Section_id = $request->Section_id;
					$data->admin_id = Auth::guard('admin')->user()->created_by;
					if(Auth::guard('admin')->user()->type == "Teacher")
					{
						$data->school_id = Auth::guard('admin')->user()->school_id;
						$getsubjectassigntech = AssignTecherSubject::where('class_id',$request->class_id)->where('subject_id',$request->assign_subject_id)->where('school_id',Auth::guard('admin')->user()->school_id)->where('teacher_id',Auth::guard('admin')->user()->staff_id)->first();
						 $data->teacher_id = $getsubjectassigntech['teacher_id'];
					}else{
						$data->school_id = Auth::guard('admin')->user()->id;
					}
					
					$data->exam_type_id = $request->exam_type_id;
					$data->student_id = $request->student_id[$i];
					$data->id_no = $request->id_no[$i];
					$data->totalsub_marks = $request->totalsub_marks;
					$data->passing_marks = $request->passing_marks;
					$data->marks = $request->marks[$i];
					$data->save();
		
					
			
				
    	
    		} // end for loop
    	}// end if conditon
		DB::commit();

			$notification = array(
    		'message' => 'Student Marks Update Successfully',
    		'alert-type' => 'success'
    	);
	


    	return redirect()->back()->with($notification);

    }// end method



    public function MarksEdit(){
		if(Auth::guard('admin')->user()->type == "Teacher")
		{
			$data['years'] = StudentYear::where('school_id',Auth::guard('admin')->user()->school_id)->get();
			
			$data['classes'] = AssignTecherSubject::with(['student_class'])->where('school_id',Auth::guard('admin')->user()->school_id)->where('teacher_id',Auth::guard('admin')->user()->staff_id)->groupBy('class_id')->get();
			$data['exam_types'] = ExamType::where('school_id',Auth::guard('admin')->user()->school_id)->get();
			$data['getsection'] = Section::where('school_id', Auth::guard('admin')->user()->school_id)->get();
			$data['getstreamas'] = Stream::where('school_id', Auth::guard('admin')->user()->school_id)->get();

		}else{
			$data['years'] = StudentYear::where('school_id',Auth::guard('admin')->user()->id)->get();
			$data['classes'] = ClassConfiger::where('school_id',Auth::guard('admin')->user()->id)->get();
			$data['exam_types'] = ExamType::where('school_id',Auth::guard('admin')->user()->id)->get();
			$data['getsection'] = Section::where('school_id', Auth::guard('admin')->user()->school_id)->get();
			$data['getstreamas'] = Stream::where('school_id', Auth::guard('admin')->user()->school_id)->get();
		}

    	return view('admin.marks.marks_edit',$data);
    }


    public function MarksEditGetStudents(Request $request){
    	$year_id = $request->year_id;
    	$class_id = $request->class_id;
    	$assign_subject_id = $request->assign_subject_id;
    	$exam_type_id = $request->exam_type_id;
		$stream_id = $request->stream_id; 
		$Section_id = $request->Section_id;
		
		if(Auth::guard('admin')->user()->type == "Teacher")
		{
    	 $getStudent = StudentMarks::with(['student'])->where('year_id',$year_id)->where('stream_id',$stream_id)->where('teacher_id',Auth::guard('admin')->user()->staff_id)->where('Section_id',$Section_id)->where('class_id',$class_id)->where('assign_subject_id',$assign_subject_id)->where('exam_type_id',$exam_type_id)->where('school_id',Auth::guard('admin')->user()->school_id)->get();
		}
		else{
			$getStudent = StudentMarks::with(['student'])->where('year_id',$year_id)->where('stream_id',$stream_id)->where('Section_id',$Section_id)->where('class_id',$class_id)->where('assign_subject_id',$assign_subject_id)->where('exam_type_id',$exam_type_id)->where('school_id',Auth::guard('admin')->user()->id)->get();
		}

    	return response()->json($getStudent);

    }


    public function MarksUpdate(Request $request){
		if(Auth::guard('admin')->user()->type == "Teacher")
		{

	     StudentMarks::where('year_id',$request->year_id)->where('teacher_id',Auth::guard('admin')->user()->staff_id)->where('Section_id',$request->Section_id)->where('stream_id',$request->stream_id)->where('class_id',$request->class_id)->where('assign_subject_id',$request->assign_subject_id)->where('exam_type_id',$request->exam_type_id)->where('school_id',Auth::guard('admin')->user()->school_id)->delete();
		}else{
			StudentMarks::where('year_id',$request->year_id)->where('class_id',$request->class_id)->where('assign_subject_id',$request->assign_subject_id)->where('exam_type_id',$request->exam_type_id)->where('school_id',Auth::guard('admin')->user()->id)->delete();
		}
     
        $studentcount = $request->student_id;
    	if ($studentcount) {
    		for ($i=0; $i <count($request->student_id) ; $i++) { 
				$data = New StudentMarks();
					$data->year_id = $request->year_id;
    		$data->class_id = $request->class_id;
    		$data->assign_subject_id = $request->assign_subject_id;
			$data->stream_id = $request->stream_id;
			$data->Section_id = $request->Section_id;
			$data->admin_id = Auth::guard('admin')->user()->created_by;
			if(Auth::guard('admin')->user()->type == "Teacher")
			{
				$data->school_id = Auth::guard('admin')->user()->school_id;
				$getsubjectassigntech = AssignTecherSubject::where('class_id',$request->class_id)->where('subject_id',$request->assign_subject_id)->where('school_id',Auth::guard('admin')->user()->school_id)->where('teacher_id',Auth::guard('admin')->user()->staff_id)->first();
					 $data->teacher_id = $getsubjectassigntech['teacher_id'];
			}else{
				$data->school_id = Auth::guard('admin')->user()->id;
			}
			
    		$data->exam_type_id = $request->exam_type_id;
    		$data->student_id = $request->student_id[$i];
    		$data->id_no = $request->id_no[$i];
    		$data->marks = $request->marks[$i];
			$data->totalsub_marks = $request->totalsub_marks[$i];
			$data->passing_marks = $request->passing_marks[$i];
    		$data->save();
    		} // end for loop
    	}// end if conditon


			$notification = array(
    		'message' => 'Student Marks Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->back()->with($notification);


    } // end marks

    public function GetStudents(Request $request){
    	$year_id = $request->year_id;
    	$class_id = $request->class_id;
    	$stream_id = $request->stream_id;
    	$Section_id = $request->Section_id;
		if(Auth::guard('admin')->user()->type == "Teacher")
		{
			$allData = AssignStudent::with(['student'])->where('year_id',$year_id)->where('stream',$stream_id)->where('section',$Section_id)->where('class_id',$class_id)->where('school_id',Auth::guard('admin')->user()->school_id)->get();
		}else{
			$allData = AssignStudent::with(['student'])->where('year_id',$year_id)->where('stream',$stream_id)->where('section',$Section_id)->where('class_id',$class_id)->where('school_id',Auth::guard('admin')->user()->id)->get();
		}
    	
    	return response()->json($allData);

    }
	public function GetSubject(Request $request){
    	$class_id = $request->class_id;
		if(Auth::guard('admin')->user()->type == "Teacher")
		{
			$allData = AssignTecherSubject::with(['school_subject'])->where('class_id',$class_id)->where('school_id',Auth::guard('admin')->user()->school_id)->where('teacher_id',Auth::guard('admin')->user()->staff_id)->get();
		}else{
			$allData = AssignSubject::with(['school_subject'])->where('class_id',$class_id)->where('school_id',Auth::guard('admin')->user()->id)->get();
		}
    	
    	return response()->json($allData);

    }

	// report--------------------------------------------------------------------------------------------------------------
	public function markreportlist()
	{
		if(Auth::guard('admin')->user()->type == "Teacher")
		{
			$data['years'] = StudentYear::where('school_id',Auth::guard('admin')->user()->school_id)->get();
			$data['classes'] = AssignTecherSubject::with(['student_class'])->where('school_id',Auth::guard('admin')->user()->school_id)->where('teacher_id',Auth::guard('admin')->user()->staff_id)->groupBy('class_id')->get();
			$data['exam_types'] = ExamType::where('school_id',Auth::guard('admin')->user()->school_id)->get();
			$data['getsection'] = Section::where('school_id', Auth::guard('admin')->user()->school_id)->get();
			$data['getstreamas'] = Stream::where('school_id', Auth::guard('admin')->user()->school_id)->get();
		}else{
			// return Auth::guard('admin')->user()->id;
			$data['years'] = StudentYear::where('school_id',Auth::guard('admin')->user()->id)->get();
			$data['classes'] = ClassConfiger::where('school_id',Auth::guard('admin')->user()->id)->get();
			$data['exam_types'] = ExamType::where('school_id',Auth::guard('admin')->user()->id)->get();
			$data['getsection'] = Section::where('school_id', Auth::guard('admin')->user()->id)->get();
			$data['getstreamas'] = Stream::where('school_id', Auth::guard('admin')->user()->id)->get();
		}
		
		return view('admin.marks.marks_report',$data);
	}
	public function GetStudentsmarkreport(Request $request){
    	$year_id = $request->year_id;
    	$class_id = $request->class_id;
    	$assign_subject_id = $request->assign_subject_id;
    	$exam_type_id = $request->exam_type_id;
		$stream_id = $request->stream_id; 
		$Section_id = $request->Section_id;
		
		if(Auth::guard('admin')->user()->type == "Teacher")
		{
			// return Auth::guard('admin')->user()->school_id;
			$allData = StudentMarks::with(['student','student_class','student_year','subject'])
			->where('Section_id',$Section_id)
			->where('stream_id',$stream_id)->where('exam_type_id',$exam_type_id)
			->where('assign_subject_id',$assign_subject_id)
			->where('year_id',$year_id)
			->where('class_id',$class_id)
			->where('school_id',Auth::guard('admin')->user()->school_id)
			->where('teacher_id',Auth::guard('admin')->user()->staff_id)
			->get();
			// return $allData;
		}else{
			$allData = StudentMarks::with(['student','student_class','student_year','subject'])->where('Section_id',$request->Section_id)->where('stream_id',$stream_id)->where('exam_type_id',$exam_type_id)->where('assign_subject_id',$assign_subject_id)->where('year_id',$year_id)->where('class_id',$class_id)->where('school_id',Auth::guard('admin')->user()->id)->get();
		}
    	
    	return response()->json($allData);

    }

}
