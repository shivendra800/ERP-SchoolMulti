<?php

namespace App\Http\Controllers\Admin;

use App\Models\Stream;
use App\Models\Section;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Models\AssignSubject;
use App\Models\ClassConfiger;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class ClassConfigerController extends Controller
{
    public function classIndex()
    {
        $classdata = ClassConfiger::where('school_id',Auth::guard('admin')->user()->id)->get()->toArray();
        $streamdata = Stream::where('school_id',Auth::guard('admin')->user()->id)->get()->toArray();
        $sectiondata = Section::where('school_id',Auth::guard('admin')->user()->id)->get()->toArray();
        // dd($sectiondata);
        $streamlsit = Stream::where('school_id',Auth::guard('admin')->user()->id)->get();
       
        return view('admin.classconfiger.class_list',compact('classdata','streamdata','sectiondata','streamlsit'));
    }

    public function AddEditclass(Request $request,$id=null)
    {
        DB::beginTransaction();
        if($id=="")
        {
            $title = "Create Class";
            $addclass = new ClassConfiger();
            $message = "Class  Created Successfully!";


        }else{

            $title = "Edit Class";
            $addclass =  ClassConfiger::find($id);
            $message = "Class Updated Created Successfully!";

        }

        if($request->isMethod('post'))
        {
            $data = $request->all();
            $validate = $request->validate([
    
                'class_name' => 'required',

                
            ]);
            $addclass->class_name = $data['class_name'];
            $addclass->admin_id = Auth::guard('admin')->user()->created_by;
            $addclass->school_id = Auth::guard('admin')->user()->id;
            
            $addclass->save();
            DB::commit();
            return redirect('/Class-List')->with('success_message',$message);
        }

        return view('admin.classconfiger.add_edit_class_configer')->with(compact('addclass','title'));
       
    }

    public function delete($id)
    {
        $classdata = ClassConfiger::findOrFail($id);
        try {
            $classdata->delete();
            $message= "Class (".$classdata['class_name'].") is Delete Successfully!";
            return redirect('/Class-List')->with('success_message',$message);
        } catch (QueryException $e){
        if($e->getCode() == "23000"){
            $message= "data cant be deleted";
            return redirect('/Class-List')->with('error_message',$message);
        }}   
    }

    public function Changestatus(Request $request)
    {
        
        $status_id=$request->get('status_id');

        $statuschange=DB::table('class_configers')
            ->where('id',$status_id)
            ->first();

        DB::table('class_configers')
        ->where('id',$status_id)
        ->update(array(
            'updated_at'=>date('Y-m-d H:i:s'),
            'status'=>$request->get('status')
        ));
        return redirect('/Class-List')->with('success_message',"Status updated Successfully!");
    }

    public function SubjectIndex()
    {
        $subjectlist =  Subject::where('school_id',Auth::guard('admin')->user()->id)->get()->toArray();       
        return view('admin.subjects.subject_list')->with(compact('subjectlist'));
    }

    public function AddEditSubject(Request $request,$id=null)
    {
        if($id== ""){
            $title= "ADD Subject";
            $addsubject = new Subject;
            $message = "New Subject Is ADD Successfully!";

        }else{
            $title= "ADD Subject";
            $addsubject =  Subject::find($id);
            $message = "New Subject Is ADD Successfully!";
        }
        if($request->isMethod('post')){
            $data = $request->all();
            $validate = $request->validate([
    
                'subject_name' => 'required',   
            ]);

            $addsubject->admin_id=Auth::guard('admin')->user()->created_by;
            $addsubject->school_id=Auth::guard('admin')->user()->id;
            $addsubject->subject_name=$data['subject_name'];
            $addsubject->save();

            return redirect('Subject-List')->with('success_message',$message);
        }
       
        return view('admin.subjects.add_edit_subject')->with(compact('title','addsubject'));
    }

    public function deleteSubject($id)
    {
        $subjectdata = Subject::findOrFail($id);
        try {
            $subjectdata->delete();
            $message= "Subject (".$subjectdata['subject_name'].") is Delete Successfully!";
            return redirect('/Subject-List')->with('success_message',$message);
        } catch (QueryException $e){
        if($e->getCode() == "23000"){
            $message= "data cant be deleted";
            return redirect('/Subject-List')->with('error_message',$message);
        }}   
    }
 
  
  
  


    
}