<?php

namespace App\Http\Controllers\Admin;

use App\Models\Unit;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AssignTecherSubject;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class UnitController extends Controller
{
    public  function UnitIndex()
    {
        $unitList = Unit::with(['student_class','school_subject'])->where('school_id',Auth::guard('admin')->user()->school_id)->where('teacher_id',Auth::guard('admin')->user()->id)->get();
        $getassigndata = AssignTecherSubject::with(['student_class'])->where('school_id',Auth::guard('admin')->user()->school_id)->where('teacher_id',Auth::guard('admin')->user()->staff_id)->groupBy('class_id')->get();
       
        return view('admin.units.unit_list')->with(compact('unitList','getassigndata'));
    }

    public  function AddEditUnit(Request $request,$id=null)
    {
        if($id==""){
            $title = "ADD Unit";
            $addunit = new Unit;
            $message = "Unit Add Successfully!";

        }else{
            $title = "ADD Unit";
            $addunit = Unit::find($id);
            $message = "Unit Updated Successfully!";

        }
        if($request->isMethod('post')){
            $data = $request->all();

            $validate = $request->validate([
        
                'unit' => 'required|regex:/[a-zA-Z\s]+/|min:3',
                'assign_class_id' => 'required',
                'assign_subject_id' => 'required',
               
                
            ]);
            
            $getadmin_id = Staff::where('id',Auth::guard('admin')->user()->staff_id)->first();
            $addunit->assign_class_id = $data['assign_class_id'];
            $addunit->assign_subject_id = $data['assign_subject_id'];
            $addunit->unit = $data['unit'];
            $addunit->admin_id = $getadmin_id['admin_id'];
            $addunit->school_id = Auth::guard('admin')->user()->school_id;
            $addunit->teacher_id = Auth::guard('admin')->user()->id;
    		$addunit->save();
            $notification = array(
                'message' => 'Unit'." ".$data['unit']." ".'Inserted Successfully',
                'alert-type' => 'success'
            );
            return redirect('Unit-List')->with($notification);
        }
        $getassigndata = AssignTecherSubject::with(['student_class'])->where('school_id',Auth::guard('admin')->user()->school_id)->where('teacher_id',Auth::guard('admin')->user()->staff_id)->groupBy('class_id')->get();
      
        return view('admin.units.add_edit_unit')->with(compact('addunit','title','getassigndata'));
    }


    public function getsubject($class_id)
    {
        try {

            $subject = AssignTecherSubject::with(['school_subject'])
                      ->where('class_id',$class_id)->where('school_id',Auth::guard('admin')->user()->school_id)
                      ->where('teacher_id',Auth::guard('admin')->user()->staff_id)->get();
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

    public function delete($id)
    {
        $unit = Unit::findOrFail($id);
        try {
            $unit->delete();
          
            $notification = array(
                'message' => 'Unit'." ".$unit['unit']." ".'Inserted Successfully',
                'alert-type' => 'success'
            );
            return redirect('/Unit-List')->with($notification);
        } catch (QueryException $e){
        if($e->getCode() == "23000"){
            
            $notification = array(
                'message' => 'data cant be deleted',
                'alert-type' => 'success'
            );
            return redirect('/Unit-List')->with($notification);
        }}   
    }
}
