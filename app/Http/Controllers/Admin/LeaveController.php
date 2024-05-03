<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\Leave;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class LeaveController extends Controller
{
    public function LeaveIndex()
    {
        
          
            $getleavedata = Leave::where('leave_status','Requested')->where('type','Teacher')->where('staff_id',Auth::guard('admin')->user()->staff_id)->where('school_id',Auth::guard('admin')->user()->school_id)->get();
       
       
        return view('admin.leaves.leave_list')->with(compact('getleavedata'));
    }
    public function stLeaveIndex()
    {
      
        $getleavedata = Leave::where('leave_status','Requested')->where('type','Student')->where('student_id',Auth::guard('admin')->user()->student_id)->where('school_id',Auth::guard('admin')->user()->school_id)->get();

      
       
        return view('admin.leaves.leave_list')->with(compact('getleavedata'));
    }

    public function AddEditLeaveRequest(Request $request,$id=null)
    {
          if($id==""){
            $title= "ADD Leave";
            $addleave = new Leave;

          }else{
            $title= "Edit Leave";
            $addleave =  Leave::find($id);
           

          }

          if($request->isMethod('post')){
            $data = $request->all();

            $getschoolid = Admin::where('school_id',Auth::guard('admin')->user()->school_id)->first();
            $getadminid = Admin::where('id',$getschoolid['school_id'])->first();
            $getassignstdata = AssignStudent::where('student_id',Auth::guard('admin')->user()->student_id)->first();

             
            $addleave->admin_id = $getadminid['created_by'];
            $addleave->school_id = Auth::guard('admin')->user()->school_id;
            if(Auth::guard('admin')->user()->type=="Student")
            {
                $addleave->student_id = Auth::guard('admin')->user()->student_id;
                $addleave->year_id = $getassignstdata['year_id'];
                $addleave->class_id = $getassignstdata['class_id'];
                $addleave->stream_id = $getassignstdata['stream'];
                $addleave->section_id = $getassignstdata['section'];
            }
            
            if(Auth::guard('admin')->user()->type=="Teacher")
            {
                $addleave->staff_id = Auth::guard('admin')->user()->staff_id;
            }

          
         
            $addleave->type = Auth::guard('admin')->user()->type;
           
            $addleave->leave_start_date = $data['leave_start_date'];
            $addleave->leave_end_date =$data['leave_end_date'];
            $addleave->leave_region = $data['leave_region'];
            $addleave->leave_status='Requested';
            $addleave->save();

            $notification = array(
                'message' => 'Leave Request Has Been Sent Successfully!. Wait For Approvel!.',
                'alert-type' => 'success'
            );
            if(Auth::guard('admin')->user()->type=='Teacher'){
                return redirect('/Leave-List')->with($notification);

            }else{
                return redirect('/stLeave-List')->with($notification);

            }
    
           

          }
          return view('admin.leaves.add_edit_leave')->with(compact('title','addleave'));
    }

    public function delete($id)
    {
        $delete = Leave::findOrFail($id);
        try {


            $delete->delete();
          
            $notification = array(
                'message' => 'Leave Request Which Your Have Create Is Delete Successfully!.',
                'alert-type' => 'success'
            );
            if(Auth::guard('admin')->user()->type=='Teacher'){
                return redirect('/Leave-List')->with($notification);

            }else{
                return redirect('/stLeave-List')->with($notification);

            }
        } catch (QueryException $e){
        if($e->getCode() == "23000"){
            
            $notification = array(
                'message' => 'data cant be deleted',
                'alert-type' => 'success'
            );
            if(Auth::guard('admin')->user()->type=='Teacher'){
                return redirect('/Leave-List')->with($notification);

            }else{
                return redirect('/stLeave-List')->with($notification);

            }
        }}   
    }

    public function staffLeaveIndex()
    {
     
        $staffleavelist = Leave::with('staff_data')->where('leave_status','Requested')->where('type','Teacher')->where('school_id',Auth::guard('admin')->user()->id)->get();
        return view('admin.leaves.staff_leave_list')->with(compact('staffleavelist'));
    }

    public function adminChangeleavestatus(Request $request ,$id)
    {
       
        $updatedata = Leave::find($id);
        $updatedata->leave_status = $request->leave_status;
        $updatedata->save();

        $notification = array(
            'message' => 'Leave Request Has Been Updated Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);


    }

    public function ApprovelList()
    {
        if(Auth::guard('admin')->user()->type=="Teacher")
        {
            $staffleavelist = Leave::with('staff_data')->where('leave_status','Approved')->where('type','Teacher')
                                             ->where('staff_id',Auth::guard('admin')->user()->staff_id)
                                        ->where('school_id',Auth::guard('admin')->user()->school_id)->get();

        } 
         if(Auth::guard('admin')->user()->type=="School-Admin")
        {
            $staffleavelist = Leave::with('staff_data')->where('leave_status','Approved')->where('type','Teacher')
            ->where('school_id',Auth::guard('admin')->user()->id)->get();
        }
      
        return view('admin.leaves.staff_approveleave_list')->with(compact('staffleavelist'));
    }
    public function Cancellist()
    {
        if(Auth::guard('admin')->user()->type=="Teacher")
        {
            $staffleavelist = Leave::with('staff_data')->where('leave_status','Cancel')->where('type','Teacher')
            ->where('staff_id',Auth::guard('admin')->user()->staff_id)
            ->where('school_id',Auth::guard('admin')->user()->school_id)->get();

        }
        if(Auth::guard('admin')->user()->type=="School-Admin")
       {
            $staffleavelist = Leave::with('staff_data')->where('leave_status','Cancel')->where('type','Teacher')->where('school_id',Auth::guard('admin')->user()->id)->get();
        }
     
        return view('admin.leaves.staff_cancelleave_list')->with(compact('staffleavelist'));
    }

    
    public function StdLeaveIndex()
    {
        $stdleavelist = Leave::with('student_data','class_data','section_data','stream_data')->where('leave_status','Requested')->where('type','Student')->where('school_id',Auth::guard('admin')->user()->id)->get();
        return view('admin.leaves.stdleave_list')->with(compact('stdleavelist'));
    }

    public function StdApprovelList()
    {
        if(Auth::guard('admin')->user()->type=="Student")
        {
            $stdleavelist = Leave::with('student_data','class_data','section_data','stream_data')->where('leave_status','Approved')->where('type','Student')->where('student_id',Auth::guard('admin')->user()->student_id)->where('school_id',Auth::guard('admin')->user()->school_id)->get();

        }
        if(Auth::guard('admin')->user()->type=="School-Admin")
        {
            $stdleavelist = Leave::with('student_data','class_data','section_data','stream_data')->where('leave_status','Approved')->where('type','Student')->where('school_id',Auth::guard('admin')->user()->id)->get();
        }
       
       
        return view('admin.leaves.std_approveleave_list')->with(compact('stdleavelist'));
    }
    public function StdCancellist()
    {
        if(Auth::guard('admin')->user()->type=="Student")
        {
            $stdleavelist = Leave::with('student_data','class_data','section_data','stream_data')->where('leave_status','Cancel')->where('type','Student')->where('student_id',Auth::guard('admin')->user()->student_id)->where('school_id',Auth::guard('admin')->user()->school_id)->get();

        } 
        if(Auth::guard('admin')->user()->type=="School-Admin")
        {
            $stdleavelist = Leave::with('student_data','class_data','section_data','stream_data')->where('leave_status','Cancel')->where('type','Student')->where('school_id',Auth::guard('admin')->user()->id)->get();
            
        }
      
        return view('admin.leaves.std_cancelleave_list')->with(compact('stdleavelist'));
    }
}
