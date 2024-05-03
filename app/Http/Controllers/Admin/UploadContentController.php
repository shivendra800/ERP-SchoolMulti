<?php

namespace App\Http\Controllers\Admin;

use App\Models\Unit;
use App\Models\Staff;
use Illuminate\Http\Request;
use App\Models\UploadContent;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class UploadContentController extends Controller
{

    public  function Uploadcontentclasswsie()
    {
        $uploadcontentList = UploadContent::with(['student_class','school_subject','getunit'])->where('school_id',Auth::guard('admin')->user()->school_id)->where('teacher_id',Auth::guard('admin')->user()->id)->groupBy('class_id')->get();
        return view('admin.uploadcontents.upload_content_classwise_list')->with(compact('uploadcontentList'));
    }
    public  function UploadContentIndex($class_id)
    {
        $uploadcontentList = UploadContent::with(['student_class','school_subject','getunit'])->where('class_id',$class_id)->where('school_id',Auth::guard('admin')->user()->school_id)->where('teacher_id',Auth::guard('admin')->user()->id)->get();
        return view('admin.uploadcontents.upload_content_list')->with(compact('uploadcontentList'));
    }

    public  function AddEditUploadContent(Request $request,$id=null)
    {
        if($id==""){
            $title = "ADD Unit Content";
            $addcontent = new UploadContent;
            $notification = array(
                'message' => 'New Unit Content Has Been Inserted Successfully!',
                'alert-type' => 'success'
            );
            if($request->isMethod('post')){
                $data = $request->all();
    
                $validate = $request->validate([
            
                    'topic_name' => 'required|regex:/[a-zA-Z\s]+/|min:3',
                    'class_id' => 'required',
                    'subject_id' => 'required',
                    'unit_id' => 'required',
                    'upload_note' => 'required|mimes:png,jpg,pdf'
                   
                    
                ]);
                if ($request->file('upload_note') != null) {
                    $image_tmp = $request->file('upload_note');
                    $extension = $image_tmp->getClientOriginalExtension();
                    $upload_note = "note_" . date('d-m-y-s') .".".$extension;
                    $destinationPath         = public_path() . "/document/upload_note";
        
                    if (!file_exists($destinationPath)) {
                        mkdir($destinationPath, 0777, true);
                    }
                    $request->file('upload_note')->move(
                        $destinationPath . '/',
                        $upload_note
                    );
                } elseif (!empty($data['current_upload_note'])) {
                    $upload_note = $data['current_upload_note'];
                } else {
                    $upload_note = "";
                }
    
    
                
                $getadmin_id = Staff::where('id',Auth::guard('admin')->user()->staff_id)->first();
                $addcontent->class_id = $data['class_id'];
                $addcontent->subject_id = $data['subject_id'];
                $addcontent->upload_note = $upload_note;
                $addcontent->unit_id = $data['unit_id'];
                $addcontent->topic_name = $data['topic_name'];
                $addcontent->admin_id = $getadmin_id['admin_id'];
                $addcontent->school_id = Auth::guard('admin')->user()->school_id;
                $addcontent->teacher_id = Auth::guard('admin')->user()->id;
                $addcontent->save();
              
                return redirect('Upload-Content-List/'.$data['class_id'])->with($notification);
            }

        }else{
            $title = "Edit Unit Content";
            $addcontent = UploadContent::find($id);
            $notification = array(
                'message' => 'Unit Content Has Been Update Successfully!',
                'alert-type' => 'success'
            );
            if($request->isMethod('post')){
                $data = $request->all();
    
                $validate = $request->validate([
            
                    'topic_name' => 'required|regex:/[a-zA-Z\s]+/|min:3',
                    'class_id' => 'required',
                    'subject_id' => 'required',
                    'unit_id' => 'required',
                    'upload_note' => 'mimes:png,jpg,pdf'
                   
                   
                    
                ]);
                if ($request->file('upload_note') != null) {
                    $image_tmp = $request->file('upload_note');
                    $extension = $image_tmp->getClientOriginalExtension();
                    $upload_note = "note_" . date('d-m-y-s') .".".$extension;
                    $destinationPath         = public_path() . "/document/upload_note";
        
                    if (!file_exists($destinationPath)) {
                        mkdir($destinationPath, 0777, true);
                    }
                    $request->file('upload_note')->move(
                        $destinationPath . '/',
                        $upload_note
                    );
                } elseif (!empty($data['current_upload_note'])) {
                    $upload_note = $data['current_upload_note'];
                } else {
                    $upload_note = "";
                }
    
    
                
                $getadmin_id = Staff::where('id',Auth::guard('admin')->user()->staff_id)->first();
                $addcontent->class_id = $data['class_id'];
                $addcontent->subject_id = $data['subject_id'];
                $addcontent->upload_note = $upload_note;
                $addcontent->unit_id = $data['unit_id'];
                $addcontent->topic_name = $data['topic_name'];
                $addcontent->admin_id = $getadmin_id['admin_id'];
                $addcontent->school_id = Auth::guard('admin')->user()->school_id;
                $addcontent->teacher_id = Auth::guard('admin')->user()->id;
                $addcontent->save();
              
                return redirect('Upload-Content-List/'.$data['class_id'])->with($notification);
            }

        }

        $getassigndata = Unit::with(['student_class'])->where('school_id',Auth::guard('admin')->user()->school_id)->where('teacher_id',Auth::guard('admin')->user()->id)->groupBy('assign_class_id')->get();
      
        return view('admin.uploadcontents.add_edit_uploadcontent')->with(compact('addcontent','title','getassigndata'));
    }

    
    public function getassignsubject($class_id)
    {
        try {

            $subject = Unit::with(['school_subject'])->where('assign_class_id',$class_id)->where('school_id',Auth::guard('admin')->user()->school_id)
                      ->where('teacher_id',Auth::guard('admin')->user()->id)->groupBy('assign_class_id')->get();
            $json['api_status'] = "OK";
            $json['data'] = $subject;
            $json['msg'] = "";
        } catch (\Exception $e) {
            DB::rollback();

            $json['api_status'] = "ERROR";
            $json['msg'] = "Error-" . $e->getLine() . " :- " . $e->getMessage();

        }
        header('Content-type: application/json');
        echo json_encode($json);
    }

    public function getunit($class_id,$subject_id)
    {
        try {

            $unit = Unit::where('assign_class_id',$class_id)->where('assign_subject_id',$subject_id)->where('school_id',Auth::guard('admin')->user()->school_id)
                      ->where('teacher_id',Auth::guard('admin')->user()->id)->get();
            $json['api_status'] = "OK";
            $json['data'] = $unit;
            $json['msg'] = "";
        } catch (\Exception $e) {
            DB::rollback();

            $json['api_status'] = "ERROR";
            $json['msg'] = "Error-" . $e->getLine() . " :- " . $e->getMessage();

        }
        header('Content-type: application/json');
        echo json_encode($json);
    }

    public function delete($id)
    {
        $uploadcontent = UploadContent::findOrFail($id);
        try {
            $uploadcontent->delete();
          
            $notification = array(
                'message' => 'Topic'." ".$uploadcontent['topic_name']." ".'Inserted Successfully',
                'alert-type' => 'success'
            );
            return redirect('Upload-Content-List/'.$uploadcontent['class_id'])->with($notification);
        } catch (QueryException $e){
        if($e->getCode() == "23000"){
            
            $notification = array(
                'message' => 'data cant be deleted',
                'alert-type' => 'success'
            );
            return redirect('Upload-Content-List/'.$uploadcontent['class_id'])->with($notification);
        }}   
    }
}
