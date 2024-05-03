<?php

namespace App\Http\Controllers\Admin;

use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Stream;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class SectionConfigerController extends Controller
{
    public function classIndex()
    {
        $section = Section::get()->toArray();
        return view('admin.classconfiger.class_list',compact('section'));
    }

    public function AddEditsection(Request $request,$id=null)
    {
        DB::beginTransaction();
        if($id=="")
        {
            $title = "Create Section";
            $section = new Section();
            $message = "Section  Created Successfully!";


        }else{

            $title = "Edit Section";
            $section =  Section::find($id);
            $message = "Section Updated Created Successfully!";

        }

        if($request->isMethod('post'))
        {
            $data = $request->all();
            $validate = $request->validate([
    
                'section_name' => 'required',
              

                
            ]);
            $section->section_name = $data['section_name'];
          
            $section->admin_id = Auth::guard('admin')->user()->created_by;
            $section->school_id = Auth::guard('admin')->user()->id;
            
            $section->save();
            DB::commit();
            return redirect()->back()->with('success_message',$message);
        }

       

        return view('admin.classconfiger.add_edit_class_configer')->with(compact('section','title'));
       
    }

    public function deletesection($id)
    {
        $section = Section::findOrFail($id);
        try {
            $section->delete();
            $message= "Section (".$section['section_name'].") is Delete Successfully!";
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

        $statuschange=DB::table('sections')
            ->where('id',$status_id)
            ->first();

        DB::table('sections')
        ->where('id',$status_id)
        ->update(array(
            'updated_at'=>date('Y-m-d H:i:s'),
            'status'=>$request->get('status')
        ));
        return redirect()->back()->with('success_message',"Status updated Successfully!");
    }

    
}
