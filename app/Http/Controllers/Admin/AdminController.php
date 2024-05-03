<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\SubscriptionPlanHistroy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function adminIndex()
    {
        $admindata = Admin::where('type','Admin')->get();
        return view('admin.admins.index',compact('admindata'));
    }

    public function AddEditAdmin(Request $request,$id=null)
    {
        if($id=="")
        {
            $title = "Create";
            $addadmin = new Admin();
            $message = "Admin Created Successfully!";
            if($request->isMethod('post'))
            {
                $data = $request->all();
                $validate = $request->validate([
        
                    'name' => 'required|regex:/[a-zA-Z\s]+/|min:3|max:255',
                    'mobile' => 'required|digits:10|unique:admins',
                    'email' => 'required|unique:admins|email',
                    'password' => 'required|min:6|required_with:confirm_password|same:confirm_password',
                    'confirm_password' => 'required|min:6',
                    
                ]);
                
                
                
                
                
                
                $email= $data['email'];
                $messageData=[
                    'name' => $data['name'],
                    'email' =>$data['email'],
                    'password'=>$data['password'],
                ];

                Mail::send('mail.send_credentialmail',$messageData,function($message)use($email){
                    $message->to($email)->subject('UIFS ERP Login Credentials!');
                });
                
                
                $addadmin->per_std_price = $data['per_std_price'];
                $addadmin->one_month_fix_price = $data['one_month_fix_price'];
                $addadmin->six_month_fix_price = $data['six_month_fix_price'];
                $addadmin->yearly_fix_price = $data['yearly_fix_price'];
                $addadmin->name = $data['name'];
                $addadmin->email = $data['email'];
                $addadmin->mobile = $data['mobile'];
                $addadmin->password = bcrypt($data['password']);;
                $addadmin->type = "Admin";
                $addadmin->status = 1;
                $addadmin->created_by = Auth::guard('admin')->user()->id;
                $addadmin->save();
                
                     $email = $data['email'];
        //php mailer core on spam
        $name= $data['name'];
        $password = $data['password'];
        
        $subject = "School ERP Login Credentials";

            $from = "admin@uifstechnologies.com";
            
            $messagedd = "
            
               
                    <tr><td>&nbsp;</td></tr><br></br>
                    <tr><td>&nbsp;</td></tr>
                    <tr><td>Hello $name</td></tr>
                      <tr><td>&nbsp;</td></tr>
                        <tr><td>&nbsp;</td></tr>
                    <tr><td>Hello $email</td></tr>
                      <tr><td>&nbsp;</td></tr>
                        <tr><td>&nbsp;</td></tr>
                    <tr><td>Hello $password</td></tr>
                      <tr><td>&nbsp;</td></tr>
                        <tr><td>&nbsp;</td></tr>
             
                         
            ";
            
            $headers = "From: $from \r\n";
            
            $headers .= "Content-type: text/html\r\n";
            
            
            mail($email,$subject,$messagedd,$headers);
            
                return redirect('/admin')->with('success_message',$message);
            }


        }else{

            $title = "Edit";
            $addadmin =  Admin::find($id);
            $message = "Admin Updated Created Successfully!";
            if($request->isMethod('post'))
            {
                $data = $request->all();
                $validate = $request->validate([
        
                    'name' => 'required|regex:/[a-zA-Z\s]+/|min:3|max:255',
                    'mobile' => 'required|digits:10',
                    
                ]);
                $addadmin->per_std_price = $data['per_std_price'];
                $addadmin->one_month_fix_price = $data['one_month_fix_price'];
                $addadmin->six_month_fix_price = $data['six_month_fix_price'];
                $addadmin->yearly_fix_price = $data['yearly_fix_price'];
                $addadmin->name = $data['name'];
                $addadmin->mobile = $data['mobile'];
                $addadmin->save();
                return redirect('/admin')->with('success_message',$message);
            }

        }



        return view('admin.admins.add_edit_admin')->with(compact('addadmin','title'));
       
    }

    public function delete($id)
    {
        $admindata = Admin::findOrFail($id);
        try {
            $admindata->delete();
            $message= "Admin (".$admindata['name'].") is Delete Successfully!";
            return redirect('/admin')->with('success_message',$message);
        } catch (QueryException $e){
        if($e->getCode() == "23000"){
            $message= "data cant be deleted";
            return redirect('/admin')->with('error_message',$message);
        }}   
    }

    public function Changestatus(Request $request)
    {
        
        $status_id=$request->get('status_id');

        $statuschange=DB::table('admins')
            ->where('id',$status_id)
            ->first();

        DB::table('admins')
        ->where('id',$status_id)
        ->update(array(
            'updated_at'=>date('Y-m-d H:i:s'),
            'status'=>$request->get('status')
        ));
        return redirect('/admin')->with('success_message',"Status updated Successfully!");
    }

    public function DetailsOfSubscription($id)
    {
        $dataalllist = SubscriptionPlanHistroy::where('admin_id',$id)->latest()->get();
        return view('admin.admins.details_of_subscription',compact('dataalllist'));
    }

    
}
