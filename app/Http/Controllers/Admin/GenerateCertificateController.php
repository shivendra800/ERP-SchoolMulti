<?php

namespace App\Http\Controllers\Admin;

use App\Models\StudentYear;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\GenerateCertificate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use PDF;

class GenerateCertificateController extends Controller
{
    public  function GenCertificateIndex()
    {
        $genctlist = GenerateCertificate::with('student_year')->where('school_id',Auth::guard('admin')->user()->id)->get();  
        return view('admin.generateCertificates.generateCertificate_index')->with(compact('genctlist'));
    }
    public  function DownloadCertificate($id)
    {
        $genctlist = GenerateCertificate::with('student_year','getschooldata','ownername')->where('school_id',Auth::guard('admin')->user()->id)->where('id',$id)->first();  
        return view('admin.generateCertificates.generate_Certificate')->with(compact('genctlist'));
    }

    public  function AddEditGenCertificate(Request $request,$id=null)
    {
        if($id==""){
            $title = " Generate New Certificate";
            $addcertificate = new GenerateCertificate;  
            $notification = array(
                'message' =>'  New Certificate Inserted Successfully',
                'alert-type' => 'success'
            );        

        }else{
            $title = "Edit Certificate";
            $addcertificate = GenerateCertificate::find($id);
            $notification = array(
                'message' =>' Certificate Update Successfully',
                'alert-type' => 'success'
            );

        }
        if($request->isMethod('post')){
            $data = $request->all();

            $validate = $request->validate([
        
                'certificate_name' => 'required|regex:/[a-zA-Z\s]+/|min:3',
                'part_name' => 'required|regex:/[a-zA-Z\s]+/|min:3',
                'content' => 'required|regex:/[a-zA-Z\s]+/|min:50',
                'year_id' => 'required',
                
            ]);
            

            $addcertificate->certificate_name = $data['certificate_name'];
            $addcertificate->part_name = $data['part_name'];
            $addcertificate->year_id = $data['year_id'];
            $addcertificate->content = $data['content'];
            $addcertificate->school_id = Auth::guard('admin')->user()->id;
            $addcertificate->admin_id = Auth::guard('admin')->user()->created_by;
    		$addcertificate->save();
          
            return redirect('Generate-Certificate-List')->with($notification);
        }
      
        $years = StudentYear::where('school_id',Auth::guard('admin')->user()->id)->get();
        return view('admin.generateCertificates.add_edit_generateCertificate')->with(compact('addcertificate','title','years'));
    }

   


    public function GenerateStudentTc($student_id){
        $data['getstudentDetails'] = AssignStudent::with(['student','getschooldata','student_class','student_stream','student_year','student_section'])->where('student_id',$student_id)->where('school_id',Auth::guard('admin')->user()->id)->first();
    
        $pdf = PDF::loadView('admin.generateCertificates.generate_tc_pdf', $data);
        // $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('Transfer-certificate.pdf');
    
   } 

   public function CharacterCertificateIndex()
   {
       $data['student'] = AssignStudent::with('student')->where('school_id',Auth::guard('admin')->user()->id)->get();

       
       $data['allData'] = AssignStudent::with(['student'])->where('school_id',Auth::guard('admin')->user()->id)->get();
       
       return view('admin.generateCertificates.charatercertificateindex',$data);
   }

   public function GenCharacterCertificate($stdid)
   {
       $data['getstudentDetails'] = AssignStudent::with(['student','getschooldata','student_class','student_stream','student_year','student_section'])->where('student_id',$stdid)->where('school_id',Auth::guard('admin')->user()->id)->first();
    
        $pdf = PDF::loadView('admin.generateCertificates.generate_Chara_certi_pdf', $data);
        // $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('character-certificate.pdf');
   }
}

