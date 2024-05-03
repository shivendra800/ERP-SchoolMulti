<?php

namespace App\Http\Controllers\Admin;

use App\Models\Staff;
use App\Models\Stream;
use App\Models\Section;
use App\Models\Subject;
use App\Models\WeekDay;
use App\Models\ExamType;
use App\Models\StudentYear;
use App\Models\StudentMarks;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\AssignSubject;
use App\Models\ClassConfiger;
use App\Models\DecideClassPeriod;
use App\Models\AssignTecherSubject;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TimetableController extends Controller
{

    public function getweek()
    {
        $getweeklist = WeekDay::get();
        return view('admin.timetables.week_list')->with(compact('getweeklist'));
    }

    public function ViewTimetable($class_id)
    {
        $getalldata = DecideClassPeriod::where('class_id', $class_id)->where('school_id', Auth::guard('admin')->user()->id)->get();
        return view('admin.timetables.view_timetbale')->with(compact('getalldata'));
    }


    public function getclass()
    {
        $classdata = ClassConfiger::where('school_id', Auth::guard('admin')->user()->id)->get();
        return view('admin.timetables.get_class_data')->with(compact('classdata'));
    }
    public function TimetableAdd(Request $request, $classid)
    {
        $data['title'] = "Add TimeTable";
        $data['years'] = StudentYear::where('school_id', Auth::guard('admin')->user()->id)->get();
        $data['weekdays'] = WeekDay::get();
        $data['getclass'] = ClassConfiger::where('school_id', Auth::guard('admin')->user()->id)->where('id', $classid)->first();
        $data['getsection'] = Section::where('school_id', Auth::guard('admin')->user()->id)->get();
        $data['subjects'] = AssignSubject::with('school_subject')->where('school_id', Auth::guard('admin')->user()->id)->where('class_id', $classid)->get();
        $data['getstreamas'] = Stream::where('school_id', Auth::guard('admin')->user()->id)->get();
        $data['getteacher'] = AssignTecherSubject::with('getsubjectteacher')->where('school_id', Auth::guard('admin')->user()->id)->where('class_id', $classid)->groupBy('teacher_id')->get();

        if ($request->isMethod('post')) {
            
            $class_period = count($request->class_period);
            if ($class_period != NULL) {

                for ($i = 0; $i < $class_period; $i++) {
                    $getnotrepeateddata= DecideClassPeriod::where('school_id',Auth::guard('admin')->user()->id)
                    ->where('year_id',$request->year_id)->where('week_days',$request->week_days)->where('class_id',$classid)
                    ->where('stream_id',$request->stream_id)->where('Section_id',$request->Section_id)
                    ->where('class_period',$request->class_period)
                    ->count();
                    // return $getnotrepeateddata;
                    if( $getnotrepeateddata === 1)
                    {
                        $notification = array(
                            'message' => 'Time Table has been updated Successfully!',
                            'alert-type' => 'success'
                        );
                        return redirect()->back()->with($notification);
                    }else
                    {
                        $assigntimetablweekwise = new DecideClassPeriod();
                        $assigntimetablweekwise->year_id = $request->year_id;
                        $assigntimetablweekwise->week_days = $request->week_days;
                        $assigntimetablweekwise->class_id = $classid;
                        $assigntimetablweekwise->stream_id = $request->stream_id;
                        $assigntimetablweekwise->Section_id = $request->Section_id;
                        $assigntimetablweekwise->room_no = $request->room_no;
                        $assigntimetablweekwise->class_period = $request->class_period[$i];
                        $assigntimetablweekwise->teacher_id = $request->teacher_id[$i];
                        $assigntimetablweekwise->subject_id = $request->subject_id[$i];
                        $assigntimetablweekwise->class_start_time = $request->class_start_time[$i];
                        $assigntimetablweekwise->class_end_time = $request->class_end_time[$i];
                        $assigntimetablweekwise->admin_id = Auth::guard('admin')->user()->created_by;
                        $assigntimetablweekwise->school_id = Auth::guard('admin')->user()->id;
                        $assigntimetablweekwise->save();
                    }
                    
                } // End For Loop
            } // End If Condition

            $notification = array(
                'message' => 'Time Table has been updated Successfully!',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }
        return view('admin.timetables.Add_timetable', $data);
    }

    public function ViewSearchTimetable()
    {
        $data['years'] = StudentYear::where('school_id', Auth::guard('admin')->user()->id)->get();
        $data['classes'] = ClassConfiger::where('school_id', Auth::guard('admin')->user()->id)->get();
        $data['exam_types'] = ExamType::where('school_id', Auth::guard('admin')->user()->id)->get();
        $data['getsection'] = Section::where('school_id', Auth::guard('admin')->user()->id)->get();
        $data['getstreamas'] = Stream::where('school_id', Auth::guard('admin')->user()->id)->get();
        $data['gettimetsbledataclass'] = DecideClassPeriod::where('school_id', Auth::guard('admin')->user()->id)->get();
        $data['getteacher'] = AssignTecherSubject::with('getsubjectteacher')->where('school_id', Auth::guard('admin')->user()->id)->groupBy('teacher_id')->get();
        return view('admin.timetables.view_edit_classwsie_table', $data);
    }



    public function Gettimetabledata(Request $request)
    {
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $stream_id = $request->stream_id;
        $Section_id = $request->Section_id;

        $alldata = DecideClassPeriod::with('getyears', 'getweek', 'student_class', 'school_subject', 'getstream', 'getsection', 'getteacher')->where('year_id', $year_id)->where('class_id', $class_id)->where('stream_id', $stream_id)->where('Section_id', $Section_id)->where('school_id', Auth::guard('admin')->user()->id)->get();


        return response()->json($alldata);
    }

    public function ViewSearchSaveTimetable(Request $request)
    {

        $data = $request->all();
        if ($request->isMethod('post')) {

            foreach ($data['time_table_id'] as $key => $getstudent) {
                if (!empty($getstudent)) {
                    DecideClassPeriod::where('id', $data['time_table_id'][$key])->update([
                        'class_start_time' => $data['class_start_time'][$key],
                        'class_end_time' => $data['class_end_time'][$key],
                        'teacher_id' => $data['teacher_id'][$key],
                    ]);
                }
            }
            $notification = array(
                'message' => 'TimeTable Has Been Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }
    } // end marks

    public function viewtimetablewithsearch()
    {
       
        $data['years'] = StudentYear::where('school_id', Auth::guard('admin')->user()->id)->get();
        $data['classes'] = ClassConfiger::where('school_id', Auth::guard('admin')->user()->id)->get();
        $data['exam_types'] = ExamType::where('school_id', Auth::guard('admin')->user()->id)->get();
        $data['getsection'] = Section::where('school_id', Auth::guard('admin')->user()->id)->get();
        $data['getstreamas'] = Stream::where('school_id', Auth::guard('admin')->user()->id)->get();
        $data['gettimetsbledataclass'] = DecideClassPeriod::where('school_id', Auth::guard('admin')->user()->id)->get();
        $data['getweek'] = WeekDay::get();
        $data['getteacher'] = AssignTecherSubject::with('getsubjectteacher')->where('school_id', Auth::guard('admin')->user()->id)->groupBy('teacher_id')->get();
        $data['alldataall'] = DecideClassPeriod::with('getyears', 'getweek', 'student_class', 'school_subject', 'getstream', 'getsection', 'getteacher')
        ->where('school_id', Auth::guard('admin')->user()->id)
        ->limit(0)->get();

        $data['alldata'] = DecideClassPeriod::with('getyears', 'getweek', 'student_class', 'school_subject', 'getstream', 'getsection', 'getteacher')
        ->where('school_id', Auth::guard('admin')->user()->id)
        ->limit(0)->get();

         $data['alldataweek2'] = DecideClassPeriod::with('getyears', 'getweek', 'student_class', 'school_subject', 'getstream', 'getsection', 'getteacher')
        ->where('school_id', Auth::guard('admin')->user()->id)
        ->limit(0)->get();

         $data['alldataweek3'] = DecideClassPeriod::with('getyears', 'getweek', 'student_class', 'school_subject', 'getstream', 'getsection', 'getteacher')
        ->where('school_id', Auth::guard('admin')->user()->id)
        ->limit(0)->get();

         $data['alldataweek4'] = DecideClassPeriod::with('getyears', 'getweek', 'student_class', 'school_subject', 'getstream', 'getsection', 'getteacher')
        ->where('school_id', Auth::guard('admin')->user()->id)
         ->limit(0)->get();

         $data['alldataweek5'] = DecideClassPeriod::with('getyears', 'getweek', 'student_class', 'school_subject', 'getstream', 'getsection', 'getteacher')
        ->where('school_id', Auth::guard('admin')->user()->id)
         ->limit(0)->get();

         $data['alldataweek6'] = DecideClassPeriod::with('getyears', 'getweek', 'student_class', 'school_subject', 'getstream', 'getsection', 'getteacher')
        ->where('school_id', Auth::guard('admin')->user()->id)
         ->limit(0)->get();

         $data['alldataweek7'] = DecideClassPeriod::with('getyears', 'getweek', 'student_class', 'school_subject', 'getstream', 'getsection', 'getteacher')
        ->where('school_id', Auth::guard('admin')->user()->id)
         ->limit(0)->get();



        return view('admin.timetables.view_classwsie_table_with_search', $data);
    }

    public function savetimetablewithsearch(Request $request)
    {
        
        $data['years'] = StudentYear::where('school_id', Auth::guard('admin')->user()->id)->get();
        $data['classes'] = ClassConfiger::where('school_id', Auth::guard('admin')->user()->id)->get();
        $data['exam_types'] = ExamType::where('school_id', Auth::guard('admin')->user()->id)->get();
        $data['getsection'] = Section::where('school_id', Auth::guard('admin')->user()->id)->get();
        $data['getstreamas'] = Stream::where('school_id', Auth::guard('admin')->user()->id)->get();
        $data['getweek'] = WeekDay::get();
        $data['gettimetsbledataclass'] = DecideClassPeriod::where('school_id', Auth::guard('admin')->user()->id)->get();
        $data['getteacher'] = AssignTecherSubject::with('getsubjectteacher')->where('school_id', Auth::guard('admin')->user()->id)->groupBy('teacher_id')->get();
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $stream_id = $request->stream_id;
        $Section_id = $request->Section_id;
        $week_id = $request->week_id;
            $alldataall = DecideClassPeriod::with('getyears', 'getweek', 'student_class', 'school_subject', 'getstream', 'getsection', 'getteacher')
                ->where('year_id', $year_id)
                ->where('class_id', $class_id)
                ->where('week_days', $week_id)
                ->where('stream_id', $stream_id)->where('Section_id', $Section_id)
                ->where('school_id', Auth::guard('admin')->user()->id)
                ->get();

            $alldata = DecideClassPeriod::with('getyears', 'getweek', 'student_class', 'school_subject', 'getstream', 'getsection', 'getteacher')
            ->where('year_id', $year_id)
            ->where('class_id', $class_id)
            ->where('week_days', '1')
            ->where('stream_id', $stream_id)->where('Section_id', $Section_id)
            ->where('school_id', Auth::guard('admin')->user()->id)
            ->get();

            $alldataweek2 = DecideClassPeriod::with('getyears', 'getweek', 'student_class', 'school_subject', 'getstream', 'getsection', 'getteacher')
            ->where('year_id', $year_id)
            ->where('class_id', $class_id)
            ->where('week_days', '2')
            ->where('stream_id', $stream_id)->where('Section_id', $Section_id)
            ->where('school_id', Auth::guard('admin')->user()->id)
            ->get();

            $alldataweek3 = DecideClassPeriod::with('getyears', 'getweek', 'student_class', 'school_subject', 'getstream', 'getsection', 'getteacher')
            ->where('year_id', $year_id)
            ->where('class_id', $class_id)
            ->where('week_days', '3')
            ->where('stream_id', $stream_id)->where('Section_id', $Section_id)
            ->where('school_id', Auth::guard('admin')->user()->id)
            ->get();

            $alldataweek4 = DecideClassPeriod::with('getyears', 'getweek', 'student_class', 'school_subject', 'getstream', 'getsection', 'getteacher')
            ->where('year_id', $year_id)
            ->where('class_id', $class_id)
            ->where('week_days', '4')
            ->where('stream_id', $stream_id)->where('Section_id', $Section_id)
            ->where('school_id', Auth::guard('admin')->user()->id)
            ->get();

            $alldataweek5 = DecideClassPeriod::with('getyears', 'getweek', 'student_class', 'school_subject', 'getstream', 'getsection', 'getteacher')
            ->where('year_id', $year_id)
            ->where('class_id', $class_id)
            ->where('week_days', '5')
            ->where('stream_id', $stream_id)->where('Section_id', $Section_id)
            ->where('school_id', Auth::guard('admin')->user()->id)
            ->get();

            $alldataweek6 = DecideClassPeriod::with('getyears', 'getweek', 'student_class', 'school_subject', 'getstream', 'getsection', 'getteacher')
            ->where('year_id', $year_id)
            ->where('class_id', $class_id)
            ->where('week_days', '6')
            ->where('stream_id', $stream_id)->where('Section_id', $Section_id)
            ->where('school_id', Auth::guard('admin')->user()->id)
            ->get();

            $alldataweek7 = DecideClassPeriod::with('getyears', 'getweek', 'student_class', 'school_subject', 'getstream', 'getsection', 'getteacher')
            ->where('year_id', $year_id)
            ->where('class_id', $class_id)
            ->where('week_days', '7')
            ->where('stream_id', $stream_id)->where('Section_id', $Section_id)
            ->where('school_id', Auth::guard('admin')->user()->id)
            ->get();

                // dd($alldata);


        return view('admin.timetables.view_classwsie_table_with_search', $data)->with(compact('alldata','alldataweek2','alldataweek3','alldataweek4','alldataweek5','alldataweek6','alldataweek7','alldataall'));
    }

    public function Viewtimetabledata(Request $request,$yeardid,$classid,$streamid,$sectionid)
    {
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $stream_id = $request->stream_id;
        $Section_id = $request->Section_id;

        $alldata = DecideClassPeriod::with('getyears', 'getweek', 'student_class', 'school_subject', 'getstream', 'getsection', 'getteacher')->where('year_id', $year_id)->where('class_id', $class_id)->where('stream_id', $stream_id)->where('Section_id', $Section_id)->where('school_id', Auth::guard('admin')->user()->id)->get();


        return response()->json($alldata);
    }
}
