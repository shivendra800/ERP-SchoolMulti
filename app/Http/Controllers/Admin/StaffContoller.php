<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\Month;
use App\Models\Staff;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SalaryCongiguration;
use App\Http\Controllers\Controller;
use App\Models\AssignTecherSubject;
use App\Models\DecideClassPeriod;
use App\Models\MonthwiseSalary;
use App\Models\SchoolRegistation;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Database\QueryException;
use PDF;

class StaffContoller extends Controller
{
    public function Index()
    {
        $stafflist = Staff::where('school_id', Auth::guard('admin')->user()->id)->get();
        return view('admin.staff.index')->with(compact('stafflist'));
    }
    public function AddEditstaff(Request $request, $id = null)
    {

        DB::beginTransaction();

        if ($id == "") {
            $title = "Create Staff";
            $addstaff = new Staff();
            $message = "staff  Created Successfully!";
            if ($request->isMethod('post')) {
                $data = $request->all();
                // dd($data);
                $validate = $request->validate([

                    'mobile' => 'required|digits:10|unique:admins|unique:staff',
                    'name' => 'required',
                    'e_dob' => 'required',
                    'e_gender' => 'required',
                    'complete_address' => 'required',
                    'e_pincode' => 'required',
                    'e_joining_date' => 'required',
                    'experience' => 'required',
                    'aadhar' => 'required',
                    'account_no' => 'required',
                    'acc_hold_name' => 'required',
                    'ifsc_code' => 'required',
                    'bank_name' => 'required',
                    'staff_type' => 'required',
                    'email' => 'required|unique:admins|unique:staff',
                    'password' => 'required|min:6|required_with:confirm_password|same:confirm_password',
                    'confirm_password' => 'required|min:6',
                    'e_image' => 'mimetypes:image/jpeg,image/png,image/jpg',
                ]);

                if ($files = $request->file('aadhar')) {
                    $destinationPath = 'admin_assets/staff_documnet/'; // upload path
                    $docImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
                    $files->move($destinationPath, $docImage);
                    $post['aadhar'] = "$docImage";
                    $addstaff->aadhar = $docImage;
                } elseif (!empty($data['current_aadhar_pdf'])) {
                    $docImage = $data['current_aadhar_pdf'];
                } else {
                    $docImage = "";
                }

                if ($request->hasFile('e_image')) {
                    $image_tmp = $request->file('e_image');
                    if ($image_tmp->isValid()) {
                        $extension = $image_tmp->getClientOriginalExtension();
                        $imageName = rand(111, 99999) . '.' . $extension;
                        $imagePath = 'admin_assets/staff_img/' . $imageName;
                        Image::make($image_tmp)->save($imagePath);
                        $addstaff->e_image = $imageName;
                    }
                } elseif (!empty($data['current_e_image'])) {
                    $imageName = $data['current_e_image'];
                } else {
                    $imageName = "";
                }


                $unique_no = Staff::orderBy('id', 'DESC')->pluck('id')->first();
                if ($unique_no == null or $unique_no == "") {
                    $unique_no = 1;
                } else {
                    $unique_no = $unique_no + 1;
                }

                $addstaff->staff_member_id = 'ST' . date("Y") . '-' . $unique_no;
                $addstaff->reg_no = 'REGID' . date("Y") . '-' . $unique_no;
                $addstaff->staff_type = $data['staff_type'];
                $addstaff->email = $data['email'];
                $addstaff->mobile = $data['mobile'];
                $addstaff->name = $data['name'];
                $addstaff->e_dob = $data['e_dob'];
                $addstaff->e_gender = $data['e_gender'];
                $addstaff->complete_address = $data['complete_address'];
                $addstaff->e_pincode = $data['e_pincode'];
                $addstaff->e_joining_date = $data['e_joining_date'];
                $addstaff->experience = $data['experience'];
                $addstaff->account_no = $data['account_no'];
                $addstaff->acc_hold_name = $data['acc_hold_name'];
                $addstaff->ifsc_code = $data['ifsc_code'];
                $addstaff->bank_name = $data['bank_name'];
                $addstaff->admin_id = Auth::guard('admin')->user()->created_by;
                $addstaff->school_id = Auth::guard('admin')->user()->id;
                $addstaff->save();
                // dd($addstaff);
                // save to admin table aslo
                $lastinster_id = DB::getPdo()->lastInsertId();

                $admin = new Admin;
                $admin->name = $data['name'];
                $admin->school_id = Auth::guard('admin')->user()->id;
                $admin->staff_id = $lastinster_id;
                $admin->email = $data['email'];
                $admin->password = bcrypt($data['password']);
                $admin->mobile = $data['mobile'];
                $admin->type = $data['staff_type'];
                $admin->status = 1;
                $admin->created_by = Auth::guard('admin')->user()->id;
                $admin->save();
                DB::commit();
                return redirect()->back()->with('success_message', $message);
            }
        } else {

            $title = "Edit Staff";
            $addstaff =  Staff::find($id);
            $message = "Staff Updated Created Successfully!";
            if ($request->isMethod('post')) {
                $data = $request->all();
                $validate = $request->validate([
                    'mobile' => 'required|unique:staff,mobile,' . $id,
                    'name' => 'required',
                    'e_dob' => 'required',
                    'e_gender' => 'required',
                    'complete_address' => 'required',
                    'e_pincode' => 'required',
                    'e_joining_date' => 'required',
                    'experience' => 'required',
                    // 'aadhar' => 'required',
                    'account_no' => 'required',
                    'acc_hold_name' => 'required',
                    'ifsc_code' => 'required',
                    'bank_name' => 'required',
                    'staff_type' => 'required',
                    'e_image' => 'mimetypes:image/jpeg,image/png,image/jpg',


                ]);
                //pdf


                if ($files = $request->file('aadhar')) {
                    $destinationPath = 'admin_assets/staff_documnet/'; // upload path
                    $docImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
                    $files->move($destinationPath, $docImage);
                    $post['aadhar'] = "$docImage";
                    $addstaff->aadhar = $docImage;
                }



                /// image
                if ($request->hasFile('e_image')) {
                    $image_tmp = $request->file('e_image');
                    if ($image_tmp->isValid()) {
                        $extension = $image_tmp->getClientOriginalExtension();
                        $imageName = rand(111, 99999) . '.' . $extension;
                        $imagePath = 'admin_assets/staff_img/' . $imageName;
                        Image::make($image_tmp)->save($imagePath);
                        $addstaff->e_image = $imageName;
                    }
                } elseif (!empty($data['current_e_image'])) {
                    $imageName = $data['current_e_image'];
                } else {
                    $imageName = "";
                }

                $addstaff->staff_type = $data['staff_type'];
                $addstaff->mobile = $data['mobile'];
                $addstaff->name = $data['name'];
                $addstaff->e_dob = $data['e_dob'];
                $addstaff->e_gender = $data['e_gender'];
                $addstaff->complete_address = $data['complete_address'];
                $addstaff->e_pincode = $data['e_pincode'];
                $addstaff->e_joining_date = $data['e_joining_date'];
                $addstaff->experience = $data['experience'];
                $addstaff->account_no = $data['account_no'];
                $addstaff->acc_hold_name = $data['acc_hold_name'];
                $addstaff->ifsc_code = $data['ifsc_code'];
                $addstaff->bank_name = $data['bank_name'];
                $addstaff->save();

                $addmin = Admin::where('id', $id)->first();
                $addmin->type = $data['staff_type'];
                $addmin->save();

                // DB::commit();
                return redirect('/staff-list')->with('success_message', $message);
            }
        }

        return view('admin.staff.staff_reg', compact('addstaff', 'title'));
    }

    public function Changestatus(Request $request)
    {

        $status_id = $request->get('status_id');

        $statuschange = DB::table('staff')
            ->where('id', $status_id)
            ->first();
        if ($statuschange) {
            DB::table('staff')
                ->where('id', $status_id)
                ->update(array(
                    'updated_at' => date('Y-m-d H:i:s'),
                    'status' => $request->get('status')
                ));
        }

        $statuschangeadmin = DB::table('admins')
            ->where('staff_id', $status_id)
            ->first();
        if ($statuschangeadmin) {
            DB::table('admins')
                ->where('staff_id', $status_id)
                ->update(array(
                    'updated_at' => date('Y-m-d H:i:s'),
                    'status' => $request->get('status')
                ));
        }


        return redirect('/staff-list')->with('success_message', "Status updated Successfully!");
    }


    public function deletestaff($id)
    {
        $staff = Staff::findOrFail($id);
        $staffadmin = Admin::where('staff_id', $id);
        try {
            $staff->delete();
            $staffadmin->delete();
            $message = "Staff (" . $staff['name'] . ") is Delete Successfully!";
            return redirect('/staff-list')->with('success_message', $message);
        } catch (QueryException $e) {
            if ($e->getCode() == "23000") {
                $message = "data cant be deleted";
                return redirect('/staff-list')->with('error_message', $message);
            }
        }
    }

    public function ConfigureStaffSalary()
    {
        $confistaffsalary = Staff::where('school_id', Auth::guard('admin')->user()->id)->where('status', 1)->get();

        return view('admin.staff.configure_staff_salary')->with(compact('confistaffsalary'));
    }

    public function ConfigureSalarySave(Request $request, $id)
    {
        $configSalary = SalaryCongiguration::where('staff_id', $id)->count();
        if ($request->isMethod('post')) {
            $data = $request->all();

            if ($configSalary > 0) {

                $addconfigsalary = SalaryCongiguration::where('staff_id', $id)->first();

                $addconfigsalary->staff_id = $id;
                $addconfigsalary->staff_member_id = $data['staff_member_id'];
                $addconfigsalary->staff_type = $data['staff_type'];
                $addconfigsalary->salary = $data['salary'];
                $addconfigsalary->medical_allowance = $data['medical_allowance'];
                $addconfigsalary->providant_fund = $data['providant_fund'];
                $addconfigsalary->employee_tax = $data['employee_tax'];
                $addconfigsalary->bonus = $data['bonus'];
                $addconfigsalary->transportation_allow = $data['transportation_allow'];
                $addconfigsalary->total = $data['total'];
                $addconfigsalary->total_dedunction = $data['total_dedunction'];
                $addconfigsalary->total_paid = $data['total_paid'];
                $addconfigsalary->admin_id = Auth::guard('admin')->user()->created_by;
                $addconfigsalary->school_id = Auth::guard('admin')->user()->id;
                $addconfigsalary->save();

                $staff = Staff::where('id', $id)->first();
                $staff->salary = $data['salary'];
                $staff->medical_allowance = $data['medical_allowance'];
                $staff->providant_fund = $data['providant_fund'];
                $staff->employee_tax = $data['employee_tax'];
                $staff->bonus = $data['bonus'];
                $staff->transportation_allow = $data['transportation_allow'];
                $staff->total = $data['total'];
                $staff->total_dedunction = $data['total_dedunction'];
                $staff->total_paid = $data['total_paid'];
                $staff->configure_salary_status = 1;
                $staff->save();
                return redirect('Configure-Staff-Salary')->with('success_message', 'Staff Salary Has Been Configure Update Successfully!');
            } else {
                $addconfigsalary =  new SalaryCongiguration;

                $addconfigsalary->staff_id = $id;
                $addconfigsalary->staff_member_id = $data['staff_member_id'];
                $addconfigsalary->staff_type = $data['staff_type'];
                $addconfigsalary->salary = $data['salary'];
                $addconfigsalary->medical_allowance = $data['medical_allowance'];
                $addconfigsalary->providant_fund = $data['providant_fund'];
                $addconfigsalary->employee_tax = $data['employee_tax'];
                $addconfigsalary->bonus = $data['bonus'];
                $addconfigsalary->transportation_allow = $data['transportation_allow'];
                $addconfigsalary->total = $data['total'];
                $addconfigsalary->total_dedunction = $data['total_dedunction'];
                $addconfigsalary->total_paid = $data['total_paid'];
                $addconfigsalary->admin_id = Auth::guard('admin')->user()->created_by;
                $addconfigsalary->school_id = Auth::guard('admin')->user()->school_id;
                $addconfigsalary->save();

                $staff = Staff::where('id', $id)->first();
                $staff->salary = $data['salary'];
                $staff->medical_allowance = $data['medical_allowance'];
                $staff->providant_fund = $data['providant_fund'];
                $staff->employee_tax = $data['employee_tax'];
                $staff->bonus = $data['bonus'];
                $staff->transportation_allow = $data['transportation_allow'];
                $staff->total = $data['total'];
                $staff->total_dedunction = $data['total_dedunction'];
                $staff->total_paid = $data['total_paid'];
                $staff->configure_salary_status = 1;
                $staff->save();

                return redirect('Configure-Staff-Salary')->with('success_message', 'Staff Salary Has Been Configure Successfully!');
            }
        }
    }

    public function PaySalary($id)
    {
        $getmonth = Month::get()->toArray();
        $getstaffsalarydata = Staff::where('school_id', Auth::guard('admin')->user()->id)->where('id', $id)->first();
        return view('admin.staff.pay_salary')->with(compact('getmonth', 'getstaffsalarydata'));
    }
    public function MonthwisePaySalary(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();


            $updatesalatarstaff = Staff::where('id', $id)->first();
            $updatesalatarstaff->salary_paid_status = $data['salary_month'];
            $updatesalatarstaff->save();
            $monthwiseSalary = new MonthwiseSalary;
            $unique_no = MonthwiseSalary::orderBy('id', 'DESC')->pluck('id')->first();
            if ($unique_no == null or $unique_no == "") {
                $unique_no = 1;
            } else {
                $unique_no = $unique_no + 1;
            }

            $monthwiseSalary->salaray_slip_no = 'S-SLIP-' . date("Y") . '-' . $unique_no;
            $monthwiseSalary->admin_id = Auth::guard('admin')->user()->created_by;
            $monthwiseSalary->school_id = Auth::guard('admin')->user()->id;
            $monthwiseSalary->staff_id = $id;
            $monthwiseSalary->staff_member_id = $updatesalatarstaff['staff_member_id'];
            $monthwiseSalary->staff_type = $updatesalatarstaff['staff_type'];
            $monthwiseSalary->salary_month = $data['salary_month'];
            $monthwiseSalary->salary = $updatesalatarstaff['salary'];
            $monthwiseSalary->medical_allowance = $updatesalatarstaff['medical_allowance'];
            $monthwiseSalary->providant_fund = $updatesalatarstaff['providant_fund'];
            $monthwiseSalary->employee_tax = $updatesalatarstaff['employee_tax'];
            $monthwiseSalary->bonus = $updatesalatarstaff['bonus'];
            $monthwiseSalary->transportation_allow = $updatesalatarstaff['transportation_allow'];
            $monthwiseSalary->total = $updatesalatarstaff['total'];
            $monthwiseSalary->total_dedunction = $updatesalatarstaff['total_dedunction'];
            $monthwiseSalary->total_paid = $updatesalatarstaff['total_paid'];
            // $monthwiseSalary->fsd = Auth::guard('admin')->user()->fsd_start;
            $monthwiseSalary->save();
            return redirect('/Configure-Staff-Salary')->with('success_message', 'Employee Salary Is Paid Of ' . $data['salary_month'] . ' Month');
        }
    }

    public function MonthwiseSalaryHistroy($id)
    {
        $mwshistory = MonthwiseSalary::where('school_id', Auth::guard('admin')->user()->id)->where('staff_id', $id)->get();
        return view('admin.staff.month_wise_salary_histroy')->with(compact('mwshistory'));
    }
    public function MWSSDownload($id)
    {
        if(Auth::guard('admin')->user()->type=="School-Admin")
        {
             $salarySlip = MonthwiseSalary::with('staffdetails', 'getschooldetails')->where('school_id', Auth::guard('admin')->user()->id)
        ->where('id', $id)->first();
        return view('admin.staff.salary_slip')->with(compact('salarySlip'));
        }
        
        
        
         if(Auth::guard('admin')->user()->type=="Teacher")
         {
              $salarySlip = MonthwiseSalary::with('staffdetails', 'getschooldetails')->where('school_id', Auth::guard('admin')->user()->school_id)
        ->where('id', $id)->first();
        return view('admin.staff.salary_slip')->with(compact('salarySlip'));
         }
        // dd($salarySlip);
        
    }
    
     public function TeachSalarySlipDownload($id)
    {
        $salarySlip = MonthwiseSalary::with('staffdetails', 'getschooldetails')->where('school_id', Auth::guard('admin')->user()->school_id)
        ->where('id', $id)->first();
        // dd($salarySlip);
        if(Auth::guard('admin')->user()->type="School-Admin")
        {
             $salarySlip = MonthwiseSalary::with('staffdetails', 'getschooldetails')->where('school_id', Auth::guard('admin')->user()->id)
        ->where('id', $id)->first();
        }
        
        
        
         if(Auth::guard('admin')->user()->type="Teacher")
         {
              $salarySlip = MonthwiseSalary::with('staffdetails', 'getschooldetails')->where('school_id', Auth::guard('admin')->user()->school_id)
        ->where('id', $id)->first();
         }
        
      
        
        return view('admin.staff.salary_slip')->with(compact('salarySlip'));
    }
    
    public function StaffSalaryReport()
    {
        $salaryreport = Staff::where('school_id', Auth::guard('admin')->user()->id)->where('status', 1)->get();

        return view('admin.staff.staff_salary_report')->with(compact('salaryreport'));
    }

    public function StaffRegDetails($id)
    {
        $data['getstaffDetails'] = Staff::with('getschooldata')->where('id', $id)->first();
        // dd($data);
        $pdf = PDF::loadView('admin.staff.staff_details_pdf', $data);
        // $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('staff_details.pdf');
    }
    public function StaffIdCard($id)
	{
		
        $data['staffidcard'] = Staff::with('getschooldata')->where('school_id',Auth::guard('admin')->user()->id)->where('id',$id)->first()->toArray();
	//   dd($staffidcard);
    $pdf = PDF::loadView('admin.staff.staff_id_card', $data);
    return $pdf->stream('staff_id_card.pdf');
	//  return view('admin.staff.staff_id_card',compact('staffidcard'));
	}

    public function ViewTeacherWiseTimetable()
    {
        $getteacherassigndata = DecideClassPeriod::where('teacher_id', Auth::guard('admin')->user()->staff_id)->where('school_id', Auth::guard('admin')->user()->school_id)->get();
        return view('admin.staff.teacher_timetable')->with(compact('getteacherassigndata'));
    }
}
