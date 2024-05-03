<?php

namespace App\Http\Controllers\Admin;

use App\Models\Fee;
use App\Models\Month;
use App\Models\Stream;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Models\ClassConfiger;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FeeController extends Controller
{
    public function Index()
    {
        $classdata = ClassConfiger::where('school_id',Auth::guard('admin')->user()->id)->get();
        $streamdata = Stream::where('school_id',Auth::guard('admin')->user()->id)->get();
         $section = Section::where('school_id',Auth::guard('admin')->user()->id)->get();
         $sectiondata = Section::where('school_id',Auth::guard('admin')->user()->id)->get();
         $getclasswisefee =  Fee::with('getmonth','getclass')->limit(0)->get();
        return view('admin.fees.list_fee',compact('classdata','streamdata','section','sectiondata','getclasswisefee'));
    }
    public function feesearch(Request $request)
    {
        $classdata = ClassConfiger::where('school_id',Auth::guard('admin')->user()->id)->get();
        $streamdata = Stream::where('school_id',Auth::guard('admin')->user()->id)->get();
         $section = Section::where('school_id',Auth::guard('admin')->user()->id)->get();
         $sectiondata = Section::where('school_id',Auth::guard('admin')->user()->id)->get();
         $getclasswisefee =  Fee::with('getmonth','getclass','getstream','getsection')->where('school_id',Auth::guard('admin')->user()->id)
                            ->where('class_id',$request->class_id)->where('stream_id',$request->stream_id)->where('section',$request->section)->get();
        return view('admin.fees.list_fee',compact('classdata','streamdata','section','sectiondata','getclasswisefee'));
    }

    public function  GetClasswisefeedata($id)
    {     
        $getclasswisefee =  Fee::with('getmonth','getclass','getstream','getsection')->where('school_id',Auth::guard('admin')->user()->id)->where('class_id',$id)->get();
        return view('admin.fees.update_fee',compact('getclasswisefee'));
    }

    public function AddEditFee(Request $request,$id=null)
    {
        // return $request->all();

        if($id==""){
            if($request->isMethod('post'))
            {
             $data= $request->all();
                $validate = $request->validate([
    
                    'fee_date' => 'required',
                    'class_fee' => 'required',
                    'class_id' => 'required',
                    'stream_id' => 'required',
                    'section' => 'required',
    
                    
                ]);
              $checkinserteddata = Fee::where('class_id',$data['class_id'])->where('stream_id',$data['stream_id'])->where('section',$data['section'])->where('admin_id',Auth::guard('admin')->user()->created_by)->where('school_id',Auth::guard('admin')->user()->id)->count();
                if($checkinserteddata >0)
                {
                    // return "yes";

                    $notification = array(
                        'message' => 'Opps!! Fee Alreay Added Please update Not Allow to add again !',
                        'alert-type' => 'success'
                    );
                    return redirect('Fee-list')->with($notification);


                }
                else{
                    // return "not";
                    $datereq= $data['fee_date'];
                    $month = date('m', strtotime($datereq));
                    $str = ltrim($month, "0"); 
                    $i =   $str;
                   

                    $array = array();

                   for ($i; $i <= 12 ; $i++){

                        $array[] = array(
                            'class_id' => $data['class_id'],
                            'stream_id' => $data['stream_id'],
                            'section' => $data['section'],
                            'month' => $i,
                            'class_fee' => $data['class_fee'],
                            'fee_date' => $data['fee_date'],
                            'admin_id' => Auth::guard('admin')->user()->created_by,
                            'school_id' => Auth::guard('admin')->user()->id,
                        
                        );
                        if($i== 12)
                        {
                            $datereq= $data['fee_date'];
                                $month = date('m', strtotime($datereq));
                                
                            for ($j=1; $j < $month ; $j++){
                                    // return  $month;
                                
                              
                                 
                                $array[] = array(
                                    'class_id' => $data['class_id'],
                                    'stream_id' => $data['stream_id'],
                                    'section' => $data['section'],
                                    'month' => $j,
                                    'class_fee' => $data['class_fee'],
                                    'fee_date' => $data['fee_date'],
                                    'admin_id' => Auth::guard('admin')->user()->created_by,
                                    'school_id' => Auth::guard('admin')->user()->id,
                                
                                );

                            } 
                        }
                       
                    }
                    
                         
          
                    
                 
 
                

                    // dd($array);

                    DB::table('fees')->insert($array);
                    $notification = array(
                        'message' => 'Fee Added Successfully!',
                        'alert-type' => 'success'
                    );
                    return redirect('Fee-list')->with($notification);

                   

                }
            

            }
           
        }else{
            if($request->isMethod('post'))
            {
                $data= $request->all();
            $fee =  Fee::find($id);
            $fee->fee_date = $data['fee_date'];
            $fee->class_fee = $data['class_fee'];
           
            $fee->save();
            }
            return redirect('Fee-list')->with('success_message',"Fee Updated Successfully!");

        }

    }
}
