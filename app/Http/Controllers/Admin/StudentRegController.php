<?php

namespace App\Http\Controllers\Admin;

use App\Models\StudentFee;
use PDF;
use App\Models\Admin;
use App\Models\Month;
use App\Models\Stream;
use App\Models\Section;
use App\Models\Student;
use App\Models\StudentYear;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\ClassConfiger;
use App\Models\StudentAttendance;
use App\Models\StudentMoreDetails;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Fee;
use Illuminate\Support\Facades\Auth;

class StudentRegController extends Controller
{
    public function StudentRegView(){
		 

    	$data['years'] = StudentYear::where('school_id',Auth::guard('admin')->user()->id)->get();
    	$data['classes'] = ClassConfiger::where('school_id',Auth::guard('admin')->user()->id)->get();

    	$data['year_id'] = StudentYear::orderBy('id','desc')->where('school_id',Auth::guard('admin')->user()->id)->first();
    	$data['class_id'] = ClassConfiger::orderBy('id','desc')->where('school_id',Auth::guard('admin')->user()->id)->first();
    	
    	$data['allData'] = AssignStudent::with(['student'])->where('school_id',Auth::guard('admin')->user()->id)->get();
		
    	return view('admin.student_reg.student_view',$data);

    }


    public function StudentClassYearWise(Request $request){
    	$data['years'] = StudentYear::where('school_id',Auth::guard('admin')->user()->id)->get();
    	$data['classes'] = ClassConfiger::where('school_id',Auth::guard('admin')->user()->id)->get();

    	$data['year_id'] = $request->year_id;
    	$data['class_id'] = $request->class_id;
    	 
    	$data['allData'] = AssignStudent::where('year_id',$request->year_id)->where('school_id',Auth::guard('admin')->user()->id)->where('class_id',$request->class_id)->get();
    	return view('admin.student_reg.student_view',$data);

    } 


    public function StudentRegAdd(){
    	$data['years'] = StudentYear::where('school_id',Auth::guard('admin')->user()->id)->get();
    	$data['classes'] = ClassConfiger::where('school_id',Auth::guard('admin')->user()->id)->get();
    	$data['stream'] = Stream::where('school_id',Auth::guard('admin')->user()->id)->get();
    	$data['section'] = Section::where('school_id',Auth::guard('admin')->user()->id)->get();
    	 
    	return view('admin.student_reg.student_add',$data);
    }


    public function StudentRegStore(Request $request){
    	DB::transaction(function() use($request){

			$validate = $request->validate([
        
                  
				'year_id' => 'required',
				'fname' => 'required',
				'mname' => 'required',
				'religion' => 'required',
				's_category' => 'required',
				'gender' => 'required',
				'stream' => 'required',
				'section' => 'required',
				'image' => 'mimetypes:image/jpeg,image/png,image/jpg',
				
				'address' => 'required',
				's_pincode' => 'required|digits:6',
				's_addmission_date' => 'required',
				'name' => 'required',
				'mobile' => 'required|digits:10|unique:admins|unique:students,f_mobile_no',
				'class_id' => 'required',
				'dob' => 'required',
				'email' => 'required|unique:admins|unique:students',
				'password' => 'required|min:6',
				
				 
			]);
    	$checkYear = StudentYear::where('school_id',Auth::guard('admin')->user()->id)->find($request->year_id)->name;
    // 	$student = Admin::where('type','Student')->orderBy('id','DESC')->first();

    // 	if ($student == null) {
    // 		$firstReg = 0;
    // 		$studentId = $firstReg+1;
    // 		if ($studentId < 10) {
    // 			$id_no = '000'.$studentId;
    // 		}elseif ($studentId < 100) {
    // 			$id_no = '00'.$studentId;
    // 		}elseif ($studentId < 1000) {
    // 			$id_no = '0'.$studentId;
    // 		}
    // 	}else{
    //  $student = Admin::where('type','Student')->orderBy('id','DESC')->where('school_id',Auth::guard('admin')->user()->id)->first()->id;
    //  	$studentId = $student+1;
    //  	if ($studentId < 10) {
    // 			$id_no = '000'.$studentId;
    // 		}elseif ($studentId < 100) {
    // 			$id_no = '00'.$studentId;
    // 		}elseif ($studentId < 1000) {
    // 			$id_no = '0'.$studentId;
    // 		}

    // 	} 
    	// end else 
    	
    	  #Store Unique Order/Product Number
                         $unique_no = Student::orderBy('id', 'DESC')->pluck('id')->first();
                         if($unique_no == null or $unique_no == ""){
                         #If Table is Empty
                         $unique_no = 1;
                         }
                         else{
                         #If Table has Already some Data
                         $unique_no = $unique_no + 1;
                     }

		

    	$final_id_no = $checkYear.$unique_no;
    	$user = new Student();
		$user->admin_id = Auth::guard('admin')->user()->created_by;
    	$user->student_id = 'SID'.$final_id_no;
    	$user->reg_no = 'REGID'.$final_id_no;
    	$user->email = $request->email;
    	$user->password = bcrypt($request->password);
    	// $user->type = 'Student';
    	$user->s_name = $request->name;
		$user->s_dob = date('Y-m-d',strtotime($request->dob));
		$user->s_gender = $request->gender;
		$user->s_category = $request->s_category;
		$user->s_relision = $request->religion;
		$user->s_address = $request->address;
		$user->s_pincode=$request->s_pincode;
		$user->s_addmission_date=$request->s_addmission_date;
		$user->current_fsd=$request->year_id;
    	$user->father_name = $request->fname;
    	$user->mother_name = $request->mname;
    	$user->f_mobile_no = $request->mobile;
		$user->stream=$request->stream;
		$user->class=$request->class_id;
		$user->section=$request->section;
		$user->school_id = Auth::guard('admin')->user()->id;
    	$user->status = 1;
        if ($request->file('image')) {
    		$file = $request->file('image');
    		$filename = date('YmdHi').$file->getClientOriginalName();
    		$file->move(public_path('upload/student_images'),$filename);
    		$user['stu_image'] = $filename;
    	}
 	    $user->save();

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
		$admin->name = $request->name;
		$admin->school_id = Auth::guard('admin')->user()->id;
		$admin->student_id = $lastinster_id;
		$admin->email = $request->email;
		$admin->password = bcrypt($request->password);
		$admin->mobile = $request->mobile;
		$admin->type = "Student";
		$admin->status = 1;
		$admin->created_by = Auth::guard('admin')->user()->id;
		$admin->save();

		$assign_student = new AssignStudent();
		$assign_student->student_id = $user->id;
		$assign_student->year_id = $request->year_id;
		$assign_student->class_id = $request->class_id;
		$assign_student->stream = $request->stream;
		$assign_student->section = $request->section;
		$assign_student->admin_id = Auth::guard('admin')->user()->created_by;
		$assign_student->school_id = Auth::guard('admin')->user()->id;
        $assign_student->save();

    	});

    	$notification = array(
    		'message' => 'Student Registration Inserted Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('student.registration.view')->with($notification);

    } // End Method 


 
    public function StudentRegEdit($student_id){
    	$data['years'] = StudentYear::where('school_id',Auth::guard('admin')->user()->id)->get();
    	$data['classes'] = ClassConfiger::where('school_id',Auth::guard('admin')->user()->id)->get();
		$data['stream'] = Stream::where('school_id',Auth::guard('admin')->user()->id)->get();
    	$data['section'] = Section::where('school_id',Auth::guard('admin')->user()->id)->get();

    	$data['editData'] = AssignStudent::with(['student'])->where('student_id',$student_id)->where('school_id',Auth::guard('admin')->user()->id)->first();
    	// dd($data['editData']->toArray());
    	return view('admin.student_reg.student_edit',$data);

    }




 public function StudentRegUpdate(Request $request,$student_id){
    	DB::transaction(function() use($request,$student_id)
		{
    	     	 
    	$user = Student::where('id',$student_id)->where('school_id',Auth::guard('admin')->user()->id)->first();    	 
    	$user->email = $request->email;
    	$user->password = bcrypt($request->password);
    	// $user->type = 'Student';
    	$user->s_name = $request->name;
		$user->s_dob = date('Y-m-d',strtotime($request->dob));
		$user->s_gender = $request->gender;
		$user->s_category = $request->s_category;
		$user->s_relision = $request->religion;
		$user->s_address = $request->address;
		$user->s_pincode=$request->s_pincode;
		$user->s_addmission_date=$request->s_addmission_date;
		$user->current_fsd=$request->year_id;
    	$user->father_name = $request->fname;
    	$user->mother_name = $request->mname;
    	$user->f_mobile_no = $request->mobile;
		$user->stream=$request->stream;
		$user->section=$request->section;
		$user->class=$request->class_id;
    	$user->section=$request->section;

    	if ($request->file('image')) {
    		$file = $request->file('image');
    		@unlink(public_path('upload/student_images/'.$user->image));
    		$filename = date('YmdHi').$file->getClientOriginalName();
    		$file->move(public_path('upload/student_images'),$filename);
    		$user['stu_image'] = $filename;
    	}
 	    $user->save();

		
		 $assign_student = AssignStudent::where('id',$request->id)->where('student_id',$student_id)->where('school_id',Auth::guard('admin')->user()->id)->first();
           
		 $assign_student->year_id = $request->year_id;
		 $assign_student->class_id = $request->class_id;
		 $assign_student->stream = $request->stream;
		 $assign_student->section = $request->section;
		 $assign_student->save();

		
		$admin =  Admin::where('school_id',Auth::guard('admin')->user()->id)->where('student_id',$student_id)->first();  
		$admin->name = $request->name;
		$admin->email = $request->email;
		$admin->password = bcrypt($request->password);
		$admin->mobile = $request->mobile;
		$admin->save();
         

    	});
		

    	$notification = array(
    		'message' => 'Student Registration Updated Successfully',
    		'alert-type' => 'success'
    	);
		

    	return redirect()->route('student.registration.view')->with($notification);

    } // End Method 


    public function StudentRegPromotion($student_id){
    	$data['years'] = StudentYear::where('school_id',Auth::guard('admin')->user()->id)->get();
    	$data['classes'] = ClassConfiger::where('school_id',Auth::guard('admin')->user()->id)->get();
		$data['stream'] = Stream::where('school_id',Auth::guard('admin')->user()->id)->get();
    
    

    	$data['editData'] = AssignStudent::with(['student'])->where('student_id',$student_id)->where('school_id',Auth::guard('admin')->user()->id)->first();
    	 
    	return view('admin.student_reg.student_promotion',$data);

    }




 public function StudentUpdatePromotion(Request $request,$student_id){
    	DB::transaction(function() use($request,$student_id){
    	 

    	 
    	$user = Student::where('id',$student_id)->where('school_id',Auth::guard('admin')->user()->id)->first();    	 
    	$user->email = $request->email;
    	$user->password = bcrypt($request->password);
    	// $user->type = 'Student';
    	$user->s_name = $request->name;
		$user->s_dob = date('Y-m-d',strtotime($request->dob));
		$user->s_gender = $request->gender;
		$user->s_category = $request->s_category;
		$user->s_relision = $request->religion;
		$user->s_address = $request->address;
		$user->s_pincode=$request->s_pincode;
		$user->s_addmission_date=$request->s_addmission_date;
		$user->current_fsd=$request->year_id;
    	$user->father_name = $request->fname;
    	$user->mother_name = $request->mname;
    	$user->f_mobile_no = $request->mobile;
		$user->stream=$request->stream;
		$user->class=$request->class_id;

    	if ($request->file('image')) {
    		$file = $request->file('image');
    		@unlink(public_path('upload/student_images/'.$user->image));
    		$filename = date('YmdHi').$file->getClientOriginalName();
    		$file->move(public_path('upload/student_images'),$filename);
    		$user['stu_image'] = $filename;
    	}
 	    $user->save();

          $assign_student = new AssignStudent();
          $assign_student->student_id = $student_id;
          $assign_student->year_id = $request->year_id;
          $assign_student->class_id = $request->class_id;
		  $assign_student->stream = $request->stream;
		  $assign_student->admin_id = Auth::guard('admin')->user()->created_by;
		  $assign_student->school_id = Auth::guard('admin')->user()->id;
          $assign_student->save();

		  $admin =  Admin::where('school_id',Auth::guard('admin')->user()->id)->where('student_id',$student_id)->first();  
		  $admin->name = $request->name;
		  $admin->email = $request->email;
		  $admin->password = bcrypt($request->password);
		  $admin->mobile = $request->mobile;
		  $admin->save();

         

    	});


    	$notification = array(
    		'message' => 'Student Promotion Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('student.registration.view')->with($notification);

    } // End Method 



    public function StudentRegDetails($student_id){
    $data['details'] = AssignStudent::with(['student','getschooldata'])->where('student_id',$student_id)->where('school_id',Auth::guard('admin')->user()->id)->first();

    $pdf = PDF::loadView('admin.student_reg.student_details_pdf', $data);
	// $pdf->SetProtection(['copy', 'print'], '', 'pass');
	return $pdf->stream('document.pdf');

    }

	public function StudentIdCard($id)
	{
		
		$data['studentidcard']  = Student::with('classdata','getschooldata','sectiondata')->where('school_id',Auth::guard('admin')->user()->id)->where('id',$id)->first()->toArray();
	  //   dd($studentidcard);
	  $pdf = PDF::loadView('admin.student_reg.student_id_card', $data);
	  // $pdf->SetProtection(['copy', 'print'], '', 'pass');
	  return $pdf->stream('student_id_card.pdf');
	//  return view('admin.student_reg.student_id_card',compact('studentidcard'));
	}

	public function Previousschooldetails(Request $request,$student_id)
	{
		$getstudentaddmin = Student::where('id',$student_id)->where('school_id',Auth::guard('admin')->user()->id)->first();
		$getStmordata = StudentMoreDetails::where('student_id',$student_id)->first();
		$getStmoredetilas = StudentMoreDetails::where('student_id',$student_id)->where('school_id',Auth::guard('admin')->user()->id)->count();
		
		if($request->isMethod('post')){
			$data = $request->all();
			 if($getStmoredetilas>0){
				
				$getStmoredetilas = StudentMoreDetails::where('student_id',$student_id)->first();

				if ($request->file('previous_school_transfer_cerificate') != null) {
					$image_tmp = $request->file('previous_school_transfer_cerificate');
					$extension = $image_tmp->getClientOriginalExtension();
					$previous_school_transfer_cerificate = "previous_school_transfer_cerificate" . date('hisymdhis') . $extension;
					$destinationPath         = public_path() . "/document/previous_school_transfer_cerificate";
		
					if (!file_exists($destinationPath)) {
						mkdir($destinationPath, 0777, true);
					}
					$request->file('previous_school_transfer_cerificate')->move(
						$destinationPath . '/',
						$previous_school_transfer_cerificate
					);
				} elseif (!empty($data['current_previous_school_transfer_cerificate'])) {
					$previous_school_transfer_cerificate = $data['current_previous_school_transfer_cerificate'];
				} else {
					$previous_school_transfer_cerificate = "";
				}

				if ($request->file('previous_school_character_cerificate') != null) {
					$image_tmp = $request->file('previous_school_character_cerificate');
					$extension = $image_tmp->getClientOriginalExtension();
					$previous_school_character_cerificate = "previous_school_character_cerificate" . date('hisymdhis') . $extension;
					$destinationPath         = public_path() . "/document/previous_school_character_cerificate";
		
					if (!file_exists($destinationPath)) {
						mkdir($destinationPath, 0777, true);
					}
					$request->file('previous_school_character_cerificate')->move(
						$destinationPath . '/',
						$previous_school_character_cerificate
					);
				} elseif (!empty($data['current_previous_school_character_cerificate'])) {
					$previous_school_character_cerificate = $data['current_previous_school_character_cerificate'];
				} else {
					$previous_school_character_cerificate = "";
				}

				$getStmoredetilas->admin_id = Auth::guard('admin')->user()->created_by;
				$getStmoredetilas->school_id = Auth::guard('admin')->user()->id;
				$getStmoredetilas->student_id = $student_id;
				$getStmoredetilas->previous_school_name = $data['previous_school_name'];
				$getStmoredetilas->previous_school_class = $data['previous_school_class'];
				$getStmoredetilas->addmistion_class = $getstudentaddmin['class'];
				$getStmoredetilas->previous_school_transfer_cerificate = $previous_school_transfer_cerificate;
				$getStmoredetilas->previous_school_character_cerificate = $previous_school_character_cerificate;
				$getStmoredetilas->save();

				

			

			 }else{
				$getStmoredetilas = new StudentMoreDetails;

				if ($request->file('previous_school_transfer_cerificate') != null) {
					$image_tmp = $request->file('previous_school_transfer_cerificate');
					$extension = $image_tmp->getClientOriginalExtension();
					$previous_school_transfer_cerificate = "previous_school_transfer_cerificate" . date('hisymdhis') . $extension;
					$destinationPath         = public_path() . "/document/previous_school_transfer_cerificate";
		
					if (!file_exists($destinationPath)) {
						mkdir($destinationPath, 0777, true);
					}
					$request->file('previous_school_transfer_cerificate')->move(
						$destinationPath . '/',
						$previous_school_transfer_cerificate
					);
				} elseif (!empty($data['current_previous_school_transfer_cerificate'])) {
					$previous_school_transfer_cerificate = $data['current_previous_school_transfer_cerificate'];
				} else {
					$previous_school_transfer_cerificate = "";
				}

				if ($request->file('previous_school_character_cerificate') != null) {
					$image_tmp = $request->file('previous_school_character_cerificate');
					$extension = $image_tmp->getClientOriginalExtension();
					$previous_school_character_cerificate = "previous_school_character_cerificate" . date('hisymdhis') . $extension;
					$destinationPath         = public_path() . "/document/previous_school_character_cerificate";
		
					if (!file_exists($destinationPath)) {
						mkdir($destinationPath, 0777, true);
					}
					$request->file('previous_school_character_cerificate')->move(
						$destinationPath . '/',
						$previous_school_character_cerificate
					);
				} elseif (!empty($data['current_previous_school_character_cerificate'])) {
					$previous_school_character_cerificate = $data['current_previous_school_character_cerificate'];
				} else {
					$previous_school_character_cerificate = "";
				}

				$getStmoredetilas->admin_id = Auth::guard('admin')->user()->created_by;
				$getStmoredetilas->school_id = Auth::guard('admin')->user()->id;
				$getStmoredetilas->student_id = $student_id;
				$getStmoredetilas->previous_school_name = $data['previous_school_name'];
				$getStmoredetilas->previous_school_class = $data['previous_school_class'];
				$getStmoredetilas->addmistion_class = $getstudentaddmin['class'];
				$getStmoredetilas->previous_school_transfer_cerificate = $previous_school_transfer_cerificate;
				$getStmoredetilas->previous_school_character_cerificate = $previous_school_character_cerificate;
				$getStmoredetilas->save();

			 }

			 $notification = array(
				'message' => 'Student More Details  Updated Successfully',
				'alert-type' => 'success'
			);
			 return redirect('students/reg/view')->with($notification);
		}

		return view('admin.student_reg.previous_school_details')->with(compact('getStmoredetilas','getstudentaddmin','getStmordata'));
	}

	public function StudentProfile($std_id)
	{

		$data['student_data'] = AssignStudent::with(['student_more_detail','student','getschooldata','student_class','student_year','student_section','student_stream'])
		->where('school_id',Auth::guard('admin')->user()->id)->where('student_id',$std_id)
		->first();
		$data['student_attendance'] = StudentAttendance::where('student_id',$std_id)->limit(0)->get();
		// dd($data);

		return view('admin.student_reg.student_profile_byid',$data);
	}

	public function StudentProfileattensearch(Request $request,$std_id)
	{

		$data['student_data'] = AssignStudent::with(['student_more_detail','student','getschooldata','student_class','student_year','student_section','student_stream'])
		->where('school_id',Auth::guard('admin')->user()->id)->where('student_id',$std_id)
		->first();

		$data['student_attendance'] = StudentAttendance::where('student_id',$std_id)
		->whereBetween('date', [$request->start_date, $request->end_date])
		->get();

	
		return view('admin.student_reg.student_profile_byid',$data);
	}

	// fe student -----------------------------------------------------------------------------------------------------------


	public function studentlist()
	{
		$data['student'] = AssignStudent::with('student')->where('school_id',Auth::guard('admin')->user()->id)->get();

    	
    	$data['allData'] = AssignStudent::with(['student'])->where('school_id',Auth::guard('admin')->user()->id)->get();
		
    	return view('admin.student_reg.student_list_fee',$data);
	}

	public function Searchstudent(Request $request)
	{
	 
    	 
    	$data['student'] = AssignStudent::with('student')->where('school_id',Auth::guard('admin')->user()->id)->get();

		$data['allData'] = AssignStudent::with(['student'])->where('student_id',$request->student_id)->where('school_id',Auth::guard('admin')->user()->id)->get();
		
		return view('admin.student_reg.student_list_fee',$data);
	}
	public function StudentFeeSubmission($std_id)
	{
		$getstaffsalarydata = AssignStudent::with(['student_more_detail','student','getschooldata','student_class','student_year','student_section','student_stream'])->where('school_id', Auth::guard('admin')->user()->id)->where('student_id', $std_id)->first();
		$getmonthfee = Fee::with('getmonth','getfeepaid','getstream','getsection')->where('school_id', Auth::guard('admin')->user()->id)->where('class_id',$getstaffsalarydata['class_id'])->where('stream_id',$getstaffsalarydata['stream'])->where('section',$getstaffsalarydata['section'])->get()->toArray();
		 
		return view('admin.student_reg.pay_fee_view')->with(compact('getmonthfee','getstaffsalarydata'));
	}

	public function MonthwisePayfee(Request $request,$std_id ,$feeid)
	{


        $getstaffsalarydata = AssignStudent::where('school_id', Auth::guard('admin')->user()->id)->where('student_id', $std_id)->first();
		$getmonthfee = Fee::with('getmonth')->where('class_id',$getstaffsalarydata['class_id'])->where('stream_id',$getstaffsalarydata['stream'])->where('section',$getstaffsalarydata['section'])->where('id',$feeid)->first();
		$getmonthfeedata = StudentFee::with('getmonth')->where('year_id',$getstaffsalarydata['year_id'])
			->where('class_id',$getstaffsalarydata['class_id'])->where('student_id',$std_id)->where('month_id',$getmonthfee['month'])->first();

		if($request->isMethod('post')){

			$data = $request->all();	

			
			$checkmonthfeedata = StudentFee::where('year_id',$getstaffsalarydata['year_id'])
			->where('class_id',$getstaffsalarydata['class_id'])->where('student_id',$std_id)->where('month_id',$getmonthfee['month'])->count();
            if($checkmonthfeedata > 0)
			{
				$notification = array(
					'message' => 'Student Fee alreay Paid!',
					'alert-type' => 'error'
				);
				 return redirect('students/reg/view')->with($notification);
			}else{
				$payfee = new StudentFee;

				$unique_no = StudentFee::orderBy('id', 'DESC')->pluck('id')->first();
				if($unique_no == null or $unique_no == ""){$unique_no = 1; }
				else{ $unique_no = $unique_no + 1; }
  
			  $payfee->inovice_no = 'RCN-'.date("dmy").'-'.$unique_no;

				$payfee->admin_id = $getstaffsalarydata['admin_id'];
				$payfee->school_id = $getstaffsalarydata['school_id'];
				$payfee->student_id = $std_id;
				$payfee->month_id = $getmonthfee['month'];
				$payfee->fee_amount = $data['fee_amount'];
				$payfee->payment_mode = $data['payment_mode'];
				if($data['late_fee_charges'] == null){
					$payfee->late_fee_charges = 0;
					
				}else{
					$payfee->late_fee_charges = $data['late_fee_charges'];
				}
				$payfee->total_fee_amount = $data['total_fee_amount'];
				$payfee->class_id = $getstaffsalarydata['class_id'];
				$payfee->stream_id = $getstaffsalarydata['stream'];
				$payfee->section_id = $getstaffsalarydata['section'];
				$payfee->year_id = $getstaffsalarydata['year_id'];
				$payfee->fee_status= "Paid";
				$payfee->save();
	
				$notification = array(
					'message' => 'Student Fee Has Paid  Successfully',
					'alert-type' => 'success'
				);
				 return redirect('/students/student-list-fee')->with($notification);
			}
			
		}

		return view('admin.student_reg.pay_feemonth_view')->with(compact('getstaffsalarydata','getmonthfee','getmonthfeedata'));
		
	}

	//student fee report 
	public function studentfeereportid()
	{
		$data['allData'] = AssignStudent::with('student')->where('school_id',Auth::guard('admin')->user()->id)->get();

		return view('admin.student_reg.student_fee_report_view',$data);
	}

	public function studentfeereportlist($std_id)
	{
	
		$data['getstudentfeeReport'] = StudentFee::with('getmonth','getclass','getyear')->where('school_id',Auth::guard('admin')->user()->id)->where('student_id',$std_id)->get()->toArray();

		return view('admin.student_reg.student_fee_report_paid_list',$data);
	}
	public function FeePaidReceipt($feepaid_id)
	{
		$data['getstudentfeeReport'] = StudentFee::with('getmonth','getclass','getyear','student','getschooldata')
		->where('school_id',Auth::guard('admin')->user()->id)->where('id',$feepaid_id)->first();
		return view('admin.student_reg.student_fee_report_paid_receipt',$data);
	}
	

}
