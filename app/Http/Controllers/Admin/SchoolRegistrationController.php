<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\SchoolRegistation;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\UpdateFSD;
use Illuminate\Support\Facades\Auth;

use Intervention\Image\Facades\Image ;


class SchoolRegistrationController extends Controller
{
    public function SchoolIndex()
    {
        $RegSchoolList = SchoolRegistation::where('admin_id',Auth::guard('admin')->user()->id)->get()->toArray();
        return view('admin.school_registration.list_school_reg')->with(compact('RegSchoolList'));
    }

    public function AddEditSchoolReg(Request $request,$id=null)
    {
        DB::beginTransaction();
        if($id== "")
        {
            $title = "Create";
            $school_reg = new SchoolRegistation;
            $message = "School created Successfully!";
            if($request->isMethod('post'))
            {
                $data = $request->all();
    
                $validate = $request->validate([
    
                    'school_name' => 'required|regex:/[a-zA-Z\s]+/|min:3|max:255',
                    'fsd_start' => 'required',
                    'fsd_end' => 'required',
                    'principal_name' => 'required|regex:/[a-zA-Z\s]+/',
                    'mobile_no' => 'required|digits:10|unique:school_registations',
                    'email' => 'required|unique:admins|unique:school_registations|email',
                    'password' => 'required|min:6|required_with:confirm_password|same:confirm_password',
                    'confirm_password' => 'required|min:6',
                    'school_address' => 'required',
                    'logo_image' => 'required|mimetypes:image/jpeg,image/png,image/jpg',
                ]);

                if ($request->hasFile('logo_image')) {
                    $image_tmp = $request->file('logo_image');
                    if ($image_tmp->isValid()) {
                        //Get Image Extension
                        $extension = $image_tmp->getClientOriginalExtension();
                        //Generate New Image
                        $imageName = rand(111, 99999) . '.' . $extension;
                        $imagePath = 'admin_assets/school_logo/' . $imageName;
                        //Upload The Image
                        Image::make($image_tmp)->save($imagePath);
                        $school_reg->logo_image = $imageName;
                    }
                } else {
                    $school_reg->logo_image = "";
                }
              
              
    
                $school_reg->admin_id = Auth::guard('admin')->user()->id;
                $school_reg->school_name = $data['school_name'];
                $school_reg->fsd_start = $data['fsd_start'];
                $school_reg->fsd_end = $data['fsd_end'];
                $school_reg->principal_name = $data['principal_name'];
                $school_reg->mobile_no = $data['mobile_no'];
                $school_reg->email = $data['email'];
                $school_reg->school_address = $data['school_address'];
                $school_reg->password = bcrypt($data['password']);
                $school_reg->save();
    
                $lastinster_id = DB::getPdo()->lastInsertId();

                $getschool= SchoolRegistation::where('admin_id',Auth::guard('admin')->user()->id)->count();
                $update_school_total_no = Admin::find(Auth::guard('admin')->user()->id);
                $update_school_total_no->total_no_of_school = $getschool;
                $update_school_total_no->save();

                $admin = new Admin;
                $admin->name = $data['school_name'];
                $admin->school_id = $lastinster_id;
                $admin->email = $data['email'];
                $admin->password = bcrypt($data['password']);
                $admin->mobile = $data['mobile_no'];
                $admin->type = "School-Admin";
                $admin->status = 1;
                $admin->created_by = Auth::guard('admin')->user()->id;
                $admin->save();
                $getlastinster_id = DB::getPdo()->lastInsertId();
               
               
    
                DB::commit();
                return redirect('/School-List')->with('success_message',$message);
                
    
    
            }

        }else{

            $title = "Edit";
            $school_reg =  SchoolRegistation::find($id);
            $message = "School updated Successfully!";
            if($request->isMethod('post'))
            {
                $data = $request->all();
    
                $validate = $request->validate([
    
                    'school_name' => 'required|regex:/[a-zA-Z\s]+/|min:3|max:255',
                    'fsd_start' => 'required',
                    'fsd_end' => 'required',
                    'principal_name' => 'required|regex:/[a-zA-Z\s]+/',
                    'mobile_no' => 'required|digits:10|unique:school_registations',
                    'email' => 'required|unique:admins|unique:school_registations|email',
                    'password' => 'required|min:6|required_with:confirm_password|same:confirm_password',
                    'confirm_password' => 'required|min:6',
                    'school_address' => 'required',
                    'logo_image' => 'mimetypes:image/jpeg,image/png,image/jpg',
                ]);

                if ($request->hasFile('logo_image')) {
                    $image_tmp = $request->file('logo_image');
                    if ($image_tmp->isValid()) {
                        //Get Image Extension
                        $extension = $image_tmp->getClientOriginalExtension();
                        //Generate New Image
                        $imageName = rand(111, 99999) . '.' . $extension;
                        $imagePath = 'admin_assets/school_logo/' . $imageName;
                        //Upload The Image
                        Image::make($image_tmp)->save($imagePath);
                        $school_reg->logo_image = $imageName;
                    }
                } elseif (!empty($data['current_logo_image'])) {
                    $imageName = $data['current_logo_image'];
                } else {
                    $imageName = "";
                }
              
              
    
                $school_reg->admin_id = Auth::guard('admin')->user()->id;
                $school_reg->school_name = $data['school_name'];
                $school_reg->fsd_start = $data['fsd_start'];
                $school_reg->fsd_end = $data['fsd_end'];
                $school_reg->principal_name = $data['principal_name'];
                $school_reg->mobile_no = $data['mobile_no'];
                $school_reg->email = $data['email'];
                $school_reg->school_address = $data['school_address'];
                $school_reg->password = bcrypt($data['password']);
                $school_reg->save();
    
                $lastinster_id = DB::getPdo()->lastInsertId();
                $admin =  Admin::where('school_id',$id)->first();
                $admin->name = $data['school_name'];
                $admin->email = $data['email'];
                $admin->password = bcrypt($data['password']);
                $admin->mobile = $data['mobile_no'];
                $admin->save();
                DB::commit();
                return redirect('/School-List')->with('success_message',$message);
            }

        }
        return view('admin.school_registration.add_edit_school_reg',compact('title','school_reg'));
    }

    public function UpdateFSDList()
    {
        $fsdlist= UpdateFSD::where('school_id',Auth::guard('admin')->user()->id)->latest()->get();
        return view('admin.schoolfsd.fsd_list')->with(compact('fsdlist'));
    }

    public function AddEditSchoolfsd(Request $request,$id=null)
    {
       if($id== ""){
        $title= "ADD FSD";
        $addfsd = new UpdateFSD;
        $message=  "Your School New Session  FSD  Date Is Created Successfull! ";
        if($request->isMethod('post')){
            $data = $request->all();

            $validate = $request->validate([
                  
                'fsd_start' => 'required',
                'fsd_end' => 'required',
            ]);
            
            $addfsd->admin_id= Auth::guard('admin')->user()->created_by;
            $addfsd->school_id= Auth::guard('admin')->user()->id;
            $addfsd->fsd_start = $data['fsd_start'];
            $addfsd->fsd_end = $data['fsd_end'];
            $addfsd->save();
            return redirect('FSD-List')->with('success_message',$message);
            }
        return view('admin.schoolfsd.add_edit_sch_fsd')->with(compact('addfsd','title'));

       }else{
        $title= "ADD FSD";
        $addfsd =  UpdateFSD::find($id);
        $message=  "Your School New Session  FSD  Date Is Created Successfull! ";
           if($request->isMethod('post')){
            $data = $request->all();
            $validate = $request->validate([
                  
                'fsd_start' => 'required',
                'fsd_end' => 'required',
                
            ]);
            
            $addfsd->admin_id= Auth::guard('admin')->user()->created_by;
            $addfsd->school_id= Auth::guard('admin')->user()->id;
            $addfsd->fsd_start = $data['fsd_start'];
            $addfsd->fsd_end = $data['fsd_end'];
            $addfsd->save();
            return redirect('FSD-List')->with('success_message',$message);
            }
            if($addfsd->fsd_status == "0")
            {
             return view('admin.schoolfsd.add_edit_sch_fsd')->with(compact('addfsd','title'));
            }
            else{
             return redirect('FSD-List')->with('error_message',"This can not be update! Because This is applied already!");
            }
       }
      
      
       
    }
    public function ApplyNewFSD(Request $request,$id)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            $applyfsd = SchoolRegistation::where('id',Auth::guard('admin')->user()->school_id)->first();
            $applyfsd->fsd_start = $data['fsd_start'];
            $applyfsd->fsd_end = $data['fsd_end'];
            $applyfsd->save();
            $applyfsd = Admin::where('id',Auth::guard('admin')->user()->id)->first();
            $applyfsd->fsd_start = $data['fsd_start'];
            $applyfsd->fsd_end = $data['fsd_end'];
            $applyfsd->save();

            $addfsd =  UpdateFSD::find($id);
            $addfsd->fsd_status = 1;
            $addfsd->save();

            return redirect()->back()->with('success_message','New FSD Apply');
           }

    }
}
