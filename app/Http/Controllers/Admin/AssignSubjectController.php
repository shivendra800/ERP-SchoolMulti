<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Models\AssignSubject;
use App\Models\ClassConfiger;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AssignSubjectController extends Controller
{
    public function ViewAssignSubject(){
        // $data['allData'] = AssignSubject::all();
          $data['allData'] = AssignSubject::select('class_id')->where('school_id',Auth::guard('admin')->user()->id)->groupBy('class_id')->get();
          return view('admin.assign_subject.view_assign_subject',$data);
      }
  
  
       public function AddAssignSubject(){
          $data['subjects'] = Subject::where('school_id',Auth::guard('admin')->user()->id)->get();
          $data['classes'] = ClassConfiger::where('school_id',Auth::guard('admin')->user()->id)->get();
          return view('admin.assign_subject.add_assign_subject',$data);
      }
  
  
      public function StoreAssignSubject(Request $request){
  
              $subjectCount = count($request->subject_id);
              if ($subjectCount !=NULL) {
                  for ($i=0; $i <$subjectCount ; $i++) { 
                      $assign_subject = new AssignSubject();
                      $assign_subject->class_id = $request->class_id;
                      $assign_subject->subject_id = $request->subject_id[$i];
                      $assign_subject->admin_id = Auth::guard('admin')->user()->created_by;
                      $assign_subject->school_id = Auth::guard('admin')->user()->id;
                      $assign_subject->save();
  
                  } // End For Loop
              }// End If Condition
  
              $notification = array(
                  'message' => 'Subject Assign Inserted Successfully',
                  'alert-type' => 'success'
              );
  
              return redirect()->route('assign.subject.view')->with($notification);
  
          }  // End Method 
  
  
       public function EditAssignSubject($class_id){
          $data['editData'] = AssignSubject::where('school_id',Auth::guard('admin')->user()->id)->where('class_id',$class_id)->orderBy('subject_id','asc')->get();
              // dd($data['editData']->toArray());
          $data['subjects'] = Subject::all();
          $data['classes'] = ClassConfiger::all();
          return view('admin.assign_subject.edit_assign_subject',$data);
  
          }
  
  
  public function UpdateAssignSubject(Request $request,$class_id){
          if ($request->subject_id == NULL) {
         
          $notification = array(
              'message' => 'Sorry You do not select any Subject',
              'alert-type' => 'error'
          );
  
          return redirect()->route('assign.subject.edit',$class_id)->with($notification);
               
          }else{
               
      $countClass = count($request->subject_id);
      AssignSubject::where('school_id',Auth::guard('admin')->user()->id)->where('class_id',$class_id)->delete(); 
              for ($i=0; $i <$countClass ; $i++) { 
                  $assign_subject = new AssignSubject();
                      $assign_subject->class_id = $request->class_id;
                      $assign_subject->subject_id = $request->subject_id[$i];
                      $assign_subject->admin_id = Auth::guard('admin')->user()->created_by;
                      $assign_subject->school_id = Auth::guard('admin')->user()->id;
                   
                      $assign_subject->save();
  
              } // End For Loop	 
  
          }// end Else
  
         $notification = array(
              'message' => 'Data Updated Successfully',
              'alert-type' => 'success'
          );
  
          return redirect()->route('assign.subject.view')->with($notification);
      } // end Method 
  
  
      public function DetailsAssignSubject($class_id){
     $data['detailsData'] = AssignSubject::where('school_id',Auth::guard('admin')->user()->id)->where('class_id',$class_id)->orderBy('subject_id','asc')->get();
  
     return view('admin.assign_subject.details_assign_subject',$data);
  
  
       }
}
