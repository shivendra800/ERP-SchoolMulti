<?php

namespace App\Http\Controllers\Admin;

use PDF;
use App\Models\Staff;

use Illuminate\Http\Request;
use App\Models\EmployeeAttendance;
use App\Http\Controllers\Controller;
use App\Models\ClassConfiger;
use App\Models\Section;
use App\Models\StudentAttendance;
use Illuminate\Support\Facades\Auth;

class AttenReportController extends Controller
{
    public function AttenReportView()
    {
        $data['employees'] = Staff::where('staff_type', 'Teacher')->where('school_id',Auth::guard('admin')->user()->id)->get();
        return view('admin.report.attend_report_view', $data);
    }


    public function AttenReportGet(Request $request)
    {

        $staff_id = $request->staff_id;
        if ($staff_id != '') {
            $where[] = ['staff_id', $staff_id];
        }
        $date = date('Y-m', strtotime($request->date));
        if ($date != '') {
            $where[] = ['date', 'like', $date . '%'];
        }

        $singleAttendance = EmployeeAttendance::with(['getstaff'])->where($where)->where('school_id',Auth::guard('admin')->user()->id)->get();

        if ($singleAttendance == true) {
            $data['allData'] = EmployeeAttendance::with(['getstaff','getschooldata'])->where($where)->where('school_id',Auth::guard('admin')->user()->id)->get();
            // dd($data['allData']->toArray());

            $data['absents'] = EmployeeAttendance::with(['getstaff'])->where($where)->where('attend_status', 'Absent')->where('school_id',Auth::guard('admin')->user()->id)->get()->count();

            $data['leaves'] = EmployeeAttendance::with(['getstaff'])->where($where)->where('attend_status', 'Leave')->where('school_id',Auth::guard('admin')->user()->id)->get()->count();

            $data['month'] = date('m-Y', strtotime($request->date));

            $pdf = PDF::loadView('admin.report.attend_report_pdf', $data);
            // $pdf->SetProtection(['copy', 'print'], '', 'pass');
            return $pdf->stream('document.pdf');
        } else {

            $notification = array(
                'message' => 'Sorry These Criteria Donse not match',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }
    } // end Method 

    public function StudentAttenReportView()
    {
        $data['class'] = ClassConfiger::where('school_id',Auth::guard('admin')->user()->id)->get();
        $data['section'] = Section::where('school_id',Auth::guard('admin')->user()->id)->get();
      
        return view('admin.report.stdattend_report_view', $data);
    }

    public function StdAttenReportGet(Request $request)
    {

        $class_id = $request->class_id;
        if ($class_id != '') {
            $where[] = ['class_id', $class_id];
        }
        $section_id = $request->section_id;
        if ($section_id != '') {
            $where[] = ['section_id', $section_id];
        }
        $start_date = date('Y-m', strtotime($request->start_date));
        if ($start_date != '') {
            $where[] = ['date', 'like', $start_date . '%'];
        }
        $end_date = date('Y-m', strtotime($request->end_date));
        if ($end_date != '') {
            $where[] = ['date', 'like', $end_date . '%'];
        }

        $studentattendance = StudentAttendance::with(['getclass','getsection','getstudent','getschooldata'])->where($where)->where('school_id',Auth::guard('admin')->user()->id)->get();

        if ($studentattendance == true) {
            $data['allData'] = StudentAttendance::with(['getstudent','getclass','getsection','getschooldata'])->where($where)->where('school_id',Auth::guard('admin')->user()->id)->get();
            //  dd($data['allData']->toArray());

            $data['absents'] = StudentAttendance::where($where)->where('attend_status', 'Absent')->where('school_id',Auth::guard('admin')->user()->id)->get()->count();

            $data['leaves'] = StudentAttendance::where($where)->where('attend_status', 'Leave')->where('school_id',Auth::guard('admin')->user()->id)->get()->count();

            $data['month_start'] = date('d-m-Y', strtotime($request->start_date));
            $data['month_end'] = date('d-m-Y', strtotime($request->end_date));

            $pdf = PDF::loadView('admin.report.studentattend_report_pdf', $data);
            // $pdf->SetProtection(['copy', 'print'], '', 'pass');
            return $pdf->stream('document.pdf');
        } else {

            $notification = array(
                'message' => 'Sorry These Criteria Donse not match',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }
    } //

}
