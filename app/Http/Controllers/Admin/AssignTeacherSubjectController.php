<?php

namespace App\Http\Controllers\Admin;

use App\Models\Staff;
use App\Models\Stream;
use App\Models\Section;
use App\Models\Subject;
use App\Models\StudentYear;
use Illuminate\Http\Request;
use App\Models\ClassConfiger;
use Illuminate\Support\Facades\DB;
use App\Models\AssignTecherSubject;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AssignTeacherSubjectController extends Controller
{
    public function TeacherList()
    {
        $data['allData'] = Staff::select('staff_member_id','name','id')->where('staff_type',"Teacher")->where('school_id',Auth::guard('admin')->user()->id)->get();
       
        return view('admin.assign_teacher_subject.view_assign_teacher_subject',$data);
    }
    public function AddAssignSubject(){
        $data['subjects'] = Subject::where('school_id',Auth::guard('admin')->user()->id)->get();
        $data['classes'] = ClassConfiger::where('school_id',Auth::guard('admin')->user()->id)->get();
        $data['teachers'] = Staff::where('staff_type',"Teacher")->where('school_id',Auth::guard('admin')->user()->id)->get();

        $data['years'] = StudentYear::where('school_id',Auth::guard('admin')->user()->id)->get();
		
       
        return view('admin.assign_teacher_subject.add_teacherassign_subject',$data);
    }
    public function getclasswisesubject($class_id)
    {
        try {
           
            $getclasswisesubject = DB::table('assign_subjects')->join('subjects','subjects.id','assign_subjects.subject_id')->select('assign_subjects.*','subjects.subject_name')->where('class_id',$class_id)->get();
            $json['api_status'] = "OK";
            $json['data'] = $getclasswisesubject;
            $json['msg'] = "";
        } catch (\Exception $e) {
            DB::rollback();
            $json['api_status'] = "ERROR";
            $json['msg'] = "Error-" . $e->getLine() . " :- " . $e->getMessage();
        }
        header('Content-type: application/json');
        echo json_encode($json);
    }
    public function AddAssignSubjectSave(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
             
          
          
            foreach ($data['class_id'] as $key => $value) {
                if (!empty($value)) {
                    $addassignteachsub = new AssignTecherSubject;
                    $addassignteachsub->class_id = $data['class_id'][$key];
                    $addassignteachsub->teacher_id = $data['teacher_id'];
                    $addassignteachsub->year_id = $data['year_id'];
                    $addassignteachsub->subject_id = $data['subject_id'][$key];
                    $addassignteachsub->admin_id = Auth::guard('admin')->user()->created_by;
                    $addassignteachsub->school_id = Auth::guard('admin')->user()->id;
                    $addassignteachsub->save();
                    
                } 
               
            }

            $getteacger= Staff::where('id',$data['teacher_id'])->first();
            $getteacger->year_id = $data['year_id'];
            $getteacger->save();
        return redirect('/Teacher-Assign-Subject-List')->with('success_message',"insert Data Successfully!");
           
           
        }

        
    }
    public function ViewDetailsAssignTechSub($teacher_id)
        {
            $data['detailsData'] = AssignTecherSubject::where('school_id',Auth::guard('admin')->user()->id)->where('teacher_id',$teacher_id)->orderBy('class_id','asc')->get();
            // dd($data);
            return view('admin.assign_teacher_subject.view_details_assign_techsub',$data);
        }

        public function EditAssignTechSubject($teacher_id)
        {
             
            $data['editData'] = AssignTecherSubject::where('school_id',Auth::guard('admin')->user()->id)->where('teacher_id',$teacher_id)->orderBy('class_id','asc')->get();
            //   dd($data['editData']->toArray());
          $data['teachers'] = Staff::where('staff_type',"Teacher")->where('school_id',Auth::guard('admin')->user()->id)->get();
         
          $data['classes'] = ClassConfiger::all();
          return view('admin.assign_teacher_subject.edit_assign_techsub',$data);
        }

        public function DeleteAssignTechSub($id)
        {
            AssignTecherSubject::where('school_id',Auth::guard('admin')->user()->id)->where('id',$id)->delete(); 
            return redirect('/TeacherAssign-subject-add')->with('success_message',"Data deleted Successfully!");
        }

}
