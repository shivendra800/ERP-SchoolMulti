<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\Stream;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Http\Request;

use App\Models\ClassConfiger;
use App\Models\SchoolRegistation;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image ;
use Illuminate\Database\QueryException;
use PDF;


class StudentRegistrationController extends Controller
{
    public function Index()
    {
        $studentlist = Student::with('classdata')->where('school_id',Auth::guard('admin')->user()->id)->get()->toArray();
        // dd($studentlist);
        return view('admin.student.index',compact('studentlist'));
    }
    public function AddEditstudentReg(Request $request,$id=null)
    {
        DB::beginTransaction();
        if($id=="")
        {
            $title = "Create Student";
            $addstudent = new Student();
            $message = "Student  Created Successfully!";
            if($request->isMethod('post'))
            {
                $data = $request->all();
                $validate = $request->validate([
        
                  
                    'current_fsd' => 'required',
                    's_addmission_date' => 'required',
                    's_name' => 'required',
                    'f_mobile_no' => 'required|digits:10',
                    'class' => 'required',
                    's_dob' => 'required',
                    'email' => 'required|unique:admins|unique:students',
                    'password' => 'required|min:6|required_with:confirm_password|same:confirm_password',
                    'confirm_password' => 'required|min:6',
                    'stu_image' => 'mimetypes:image/jpeg,image/png,image/jpg',
                ]);
                if ($request->hasFile('stu_image')) {
                    $image_tmp = $request->file('stu_image');
                    if ($image_tmp->isValid()) {
                        $extension = $image_tmp->getClientOriginalExtension();
                        $imageName = rand(111, 99999) . '.' . $extension;
                        $imagePath = 'admin_assets/student_img/' . $imageName;
                        Image::make($image_tmp)->save($imagePath);
                        $addstudent->stu_image = $imageName;
                    }
                } elseif (!empty($data['current_stu_image'])) {
                    $imageName = $data['current_stu_image'];
                } else {
                    $imageName = "";
                }
              
              
                  $unique_no = Student::orderBy('id', 'DESC')->pluck('id')->first();
                  if($unique_no == null or $unique_no == ""){$unique_no = 1; }
                  else{ $unique_no = $unique_no + 1; }
    
                $addstudent->student_id = 'SID'.date("Y").'-'.$unique_no;
                $addstudent->reg_no = 'REGID'.date("Y").'-'.$unique_no;
                $addstudent->email=$data['email'];
                $addstudent->password=$data['password'];
                $addstudent->s_name=$data['s_name'];
                $addstudent->s_dob=$data['s_dob'];
                $addstudent->s_gender=$data['s_gender'];
                $addstudent->s_category=$data['s_category'];
                $addstudent->s_relision=$data['s_relision'];
                $addstudent->s_address=$data['s_address'];
                $addstudent->s_state=$data['s_state'];
                $addstudent->s_city=$data['s_city'];
                $addstudent->s_area=$data['s_area'];
                $addstudent->s_pincode=$data['s_pincode'];
                $addstudent->s_addmission_date=$data['s_addmission_date'];
                $addstudent->current_fsd=$data['current_fsd'];
                $addstudent->blood_group=$data['blood_group'];
                $addstudent->father_name=$data['father_name'];
                $addstudent->mother_name=$data['mother_name'];
                $addstudent->father_occu=$data['father_occu'];
                $addstudent->mother_occu=$data['mother_occu'];
                $addstudent->p_address=$data['p_address'];
                $addstudent->f_mobile_no=$data['f_mobile_no'];
                $addstudent->m_mobile_no=$data['m_mobile_no'];
                $addstudent->stream=$data['stream'];
                $addstudent->section=$data['section'];
                $addstudent->class=$data['class'];
                $addstudent->passsed_year= $data['passsed_year'];
                $addstudent->passsed_class= $data['passsed_class'];
                $addstudent->passsed_school_name= $data['passsed_school_name'];
                $addstudent->passsed_marks= $data['passsed_marks'];
                $addstudent->passsed_percentage= $data['passsed_percentage'];
                $addstudent->admin_id = Auth::guard('admin')->user()->created_by;
                $addstudent->school_id = Auth::guard('admin')->user()->id;
                $addstudent->save();
                // save to admin table aslo
                $lastinster_id = DB::getPdo()->lastInsertId();

                // store in admin where  type  is admin that is school owner total no of student 

                $getstudent= Student::where('admin_id',Auth::guard('admin')->user()->created_by)->count();
                $update_student_total_no = Admin::find(Auth::guard('admin')->user()->created_by);
                $update_student_total_no->total_no_of_student = $getstudent;
                $update_student_total_no->save();

                // store in admin where  type  is school-admin that is school princial total no of student

                $getstudent2= Student::where('school_id',Auth::guard('admin')->user()->id)->count();
                $update_student_total_no2 = Admin::find(Auth::guard('admin')->user()->id);
                $update_student_total_no2->total_no_of_student = $getstudent2;
                $update_student_total_no2->save();

                $admin = new Admin;
                $admin->name = $data['s_name'];
                $admin->school_id = Auth::guard('admin')->user()->id;
                $admin->student_id = $lastinster_id;
                $admin->email = $data['email'];
                $admin->password = bcrypt($data['password']);
                $admin->mobile = $data['f_mobile_no'];
                $admin->type = "Student";
                $admin->status = 1;
                $admin->created_by = Auth::guard('admin')->user()->id;
                $admin->save();
                DB::commit();
                return redirect()->back()->with('success_message',$message);
            }


        }else{

            $title = "Edit Student";
            $addstudent =  Student::find($id);
            $message = "Student Updated Created Successfully!";
            if($request->isMethod('post'))
            {
                $data = $request->all();
                $validate = $request->validate([
                          
                    'current_fsd' => 'required',
                    's_addmission_date' => 'required',
                    's_name' => 'required',
                    'f_mobile_no' => 'required|digits:10',
                    'class' => 'required',
                    's_dob' => 'required',
                    'stu_image' => 'mimetypes:image/jpeg,image/png,image/jpg',
                ]);
                if ($request->hasFile('stu_image')) {
                    $image_tmp = $request->file('stu_image');
                    if ($image_tmp->isValid()) {
                        $extension = $image_tmp->getClientOriginalExtension();
                        $imageName = rand(111, 99999) . '.' . $extension;
                        $imagePath = 'admin_assets/student_img/' . $imageName;
                        Image::make($image_tmp)->save($imagePath);
                        $addstudent->stu_image = $imageName;
                    }
                } elseif (!empty($data['current_stu_image'])) {
                    $imageName = $data['current_stu_image'];
                } else {
                    $imageName = "";
                }
                           
                
               
                $addstudent->s_name=$data['s_name'];
                $addstudent->s_dob=$data['s_dob'];
                $addstudent->s_gender=$data['s_gender'];
                $addstudent->s_category=$data['s_category'];
                $addstudent->s_relision=$data['s_relision'];
                $addstudent->s_address=$data['s_address'];
                $addstudent->s_state=$data['s_state'];
                $addstudent->s_city=$data['s_city'];
                $addstudent->s_area=$data['s_area'];
                $addstudent->s_pincode=$data['s_pincode'];
                $addstudent->s_addmission_date=$data['s_addmission_date'];
                $addstudent->current_fsd=$data['current_fsd'];
                $addstudent->blood_group=$data['blood_group'];
                $addstudent->father_name=$data['father_name'];
                $addstudent->mother_name=$data['mother_name'];
                $addstudent->father_occu=$data['father_occu'];
                $addstudent->mother_occu=$data['mother_occu'];
                $addstudent->p_address=$data['p_address'];
                $addstudent->f_mobile_no=$data['f_mobile_no'];
                $addstudent->m_mobile_no=$data['m_mobile_no'];
                $addstudent->stream=$data['stream'];
                $addstudent->section=$data['section'];
                $addstudent->class=$data['class'];
                $addstudent->passsed_year= $data['passsed_year'];
                $addstudent->passsed_class= $data['passsed_class'];
                $addstudent->passsed_school_name= $data['passsed_school_name'];
                $addstudent->passsed_marks= $data['passsed_marks'];
                $addstudent->passsed_percentage= $data['passsed_percentage'];
                $addstudent->save();
               
                DB::commit();
                return redirect('/student-list')->with('success_message',$message);
            }

        }


        $classdata = ClassConfiger::where('school_id',Auth::guard('admin')->user()->id)->get()->toArray();
        $streamdata = Stream::where('school_id',Auth::guard('admin')->user()->id)->get()->toArray();
        $sectiondata = Section::with('stream','class')->where('school_id',Auth::guard('admin')->user()->id)->get()->toArray();

        return view('admin.student.add_edit_student')->with(compact('addstudent','title','classdata','streamdata','sectiondata'));
       
    }
    public function Changestatus(Request $request)
    {
        
        $status_id=$request->get('status_id');

        $statuschange=DB::table('students')
            ->where('id',$status_id)
            ->first();
        if($statuschange)
        {
                    DB::table('students')
                    ->where('id',$status_id)
                    ->update(array(
                        'updated_at'=>date('Y-m-d H:i:s'),
                        'status'=>$request->get('status')
                    ));
        }

        $statuschangeadmin=DB::table('admins')
            ->where('student_id',$status_id)
            ->first();
        if($statuschangeadmin)
        {
            DB::table('admins')
            ->where('student_id',$status_id)
            ->update(array(
                'updated_at'=>date('Y-m-d H:i:s'),
                'status'=>$request->get('status')
            ));
        }

       
        return redirect('/student-list')->with('success_message',"Status updated Successfully!");
    }

    
    public function deletestudentReg($id)
    {
        $student = Student::findOrFail($id);
        $studentadmin = Admin::where('student_id',$id);
        try {
            $student->delete();
            $studentadmin->delete();
            $message= "Student (".$student['student_id'].") is Delete Successfully!";
            return redirect('/student-list')->with('success_message',$message);
        } catch (QueryException $e){
        if($e->getCode() == "23000"){
            $message= "data cant be deleted";
            return redirect('/student-list')->with('error_message',$message);
        }}   
    }

    public function StudentRegDetails($id){
        $data['getstudentDetails'] = Student::with('classdata','getschooldata','sectiondata')->where('id',$id)->first();
       $pdf = PDF::loadView('admin.student.student_details_pdf', $data);
        // $pdf->SetProtection(['copy', 'print'], '', 'pass');
       return $pdf->stream('student_details.pdf');
   
       }
}
