<?php

namespace App\Http\Controllers\Admin;

use App\Models\ExamType;
use App\Models\StudentYear;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\ClassConfiger;
use App\Models\AssignTecherSubject;
use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\Stream;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class PromotionController extends Controller
{
     public function StudentPromotion()
     {
        $data['years'] = StudentYear::where('school_id',Auth::guard('admin')->user()->id)->get();
			
        $data['classes'] = ClassConfiger::where('school_id',Auth::guard('admin')->user()->id)->get();
        $data['stream'] = Stream::where('school_id',Auth::guard('admin')->user()->id)->get();
        $data['section'] = Section::where('school_id',Auth::guard('admin')->user()->id)->get();
       
        return view('admin.studentpromotions.student_promotion',$data);
      }

      public function GetStudents(Request $request)
      {
        $year_id = $request->year_id;
    	$class_id = $request->class_id;
			$allData = AssignStudent::with(['student','student_class','student_stream','student_section'])->where('year_id',$year_id)->where('class_id',$class_id)->where('school_id',Auth::guard('admin')->user()->id)->get();
		
    	
    	return response()->json($allData);
      }

      public function MarksStore(Request $request)
      {
        $data = $request->all();
        if($request->isMethod('post')){
           
            foreach($data['student_id'] as $key => $getstudent  ){
                if(!empty($getstudent)){
                     AssignStudent::where('student_id',$data['student_id'][$key])->update([
                        'class_id' => $data['class_id'][$key],
                        'stream' => $data['stream'][$key],
                        'section' => $data['section'][$key],
                        'year_id' => $data['year_id'][$key],
                        'remark' => "This student Has Been Promoted-".'' .'' .date('Y-m-d'),

                    ]);
                }
            }
            foreach($data['student_id'] as $key => $getstudent  ){
                if(!empty($getstudent)){
                     Student::where('id',$data['student_id'][$key])->update([
                        'class' => $data['class_id'][$key],
                    

                    ]);
                }
            }
        }
			$notification = array(
    		'message' => 'Student Has Been Promoted Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->back()->with($notification);

    }// end method
}
