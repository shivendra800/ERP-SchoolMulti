<?php

namespace App\Http\Controllers\Admin;

use App\Models\Stream;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class StreamConfigerController extends Controller
{
     

    public function AddEditstream(Request $request,$id=null)
    {
        DB::beginTransaction();
        if($id=="")
        {
            $title = "Create Stream";
            $addstream = new Stream();
            $message = "Stream  Created Successfully!";


        }else{

            $title = "Edit Stream";
            $addstream =  Stream::find($id);
            $message = "Stream Updated Created Successfully!";

        }

        if($request->isMethod('post'))
        {
            $data = $request->all();
            $validate = $request->validate([
    
                'stream_name' => 'required',

                
            ]);
            $addstream->stream_name = $data['stream_name'];
            $addstream->admin_id = Auth::guard('admin')->user()->created_by;
            $addstream->school_id = Auth::guard('admin')->user()->id;
            
            $addstream->save();
            DB::commit();
            return redirect()->back()->with('success_message',$message);
        }

        return view('admin.classconfiger.add_edit_class_configer')->with(compact('addstream','title'));
       
    }

    public function deleteStream($id)
    {
       
        $streamdata = Stream::findOrFail($id);
        try {
            $streamdata->delete();
            $message= "Stream (".$streamdata['stream_name'].") is Delete Successfully!";
            return redirect()->back()->with('success_message',$message);
        } catch (QueryException $e){
        if($e->getCode() == "23000"){
            $message= "data cant be deleted";
            return redirect()->back()->with('error_message',$message);
        }}   
    }

    public function Changestatus(Request $request)
    {
        
        $status_id=$request->get('status_id');

        $statuschange=DB::table('streams')
            ->where('id',$status_id)
            ->first();

        DB::table('streams')
        ->where('id',$status_id)
        ->update(array(
            'updated_at'=>date('Y-m-d H:i:s'),
            'status'=>$request->get('status')
        ));
        return redirect('/Class-List')->with('success_message',"Status updated Successfully!");
    }

    
}
