<?php

namespace App\Http\Controllers\Admin;

use App\Models\ExamType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ExamTypeController extends Controller
{
	public function ViewExamType()
	{
		$data['allData'] = ExamType::where('school_id', Auth::guard('admin')->user()->id)->get();
		return view('admin.exam_type.view_exam_type', $data);
	}


	public function ExamTypeAdd()
	{
		return view('admin.exam_type.add_exam_type');
	}


	public function ExamTypeStore(Request $request)
	{

		$validatedData = $request->validate([
			'name' => 'required|unique:exam_types,name',
			'passing_percantage_st' => 'required',

		]);

		$data = new ExamType();
		$data->name = $request->name;
		$data->passing_percantage_st = $request->passing_percantage_st;
		$data->admin_id = Auth::guard('admin')->user()->created_by;
		$data->school_id = Auth::guard('admin')->user()->id;
		$data->save();

		$notification = array(
			'message' => 'Exam Type Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('exam.type.view')->with($notification);
	}


	public function ExamTypeEdit($id)
	{
		$editData = ExamType::where('school_id', Auth::guard('admin')->user()->id)->find($id);
		return view('admin.exam_type.edit_exam_type', compact('editData'));
	}

	public function ExamTypeUpdate(Request $request, $id)
	{

		$data = ExamType::where('school_id',Auth::guard('admin')->user()->id)->find($id);

		$validatedData = $request->validate([
			'name' => 'required|unique:exam_types,name,' . $data->id,
			'passing_percantage_st' => 'required',

		]);


		$data->name = $request->name;
		$data->passing_percantage_st = $request->passing_percantage_st;
		$data->save();

		$notification = array(
			'message' => 'Exam Type Updated Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('exam.type.view')->with($notification);
	}


	public function ExamTypeDelete($id)
	{
		$user = ExamType::where('school_id',Auth::guard('admin')->user()->id)->find($id);
		$user->delete();

		$notification = array(
			'message' => 'Exam Type Deleted Successfully',
			'alert-type' => 'info'
		);

		return redirect()->route('exam.type.view')->with($notification);
	}
}
