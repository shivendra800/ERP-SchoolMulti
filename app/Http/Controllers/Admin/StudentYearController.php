<?php

namespace App\Http\Controllers\Admin;

use App\Models\StudentYear;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StudentYearController extends Controller
{
	public function ViewYear()
	{
		$data['allData'] = StudentYear::where('school_id', Auth::guard('admin')->user()->id)->get();
		return view('admin.year.view_year', $data);
	}


	public function StudentYearAdd()
	{
		return view('admin.year.add_year');
	}

	public function StudentYearStore(Request $request)
	{

		$validatedData = $request->validate([
			'name' => 'required',

		]);

		$data = new StudentYear();
		$data->name = $request->name;
		$data->admin_id = Auth::guard('admin')->user()->created_by;
		$data->school_id = Auth::guard('admin')->user()->id;
		$data->save();

		$notification = array(
			'message' => 'Student Year Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('student.year.view')->with($notification);
	}


	public function StudentYearEdit($id)
	{
		$editData = StudentYear::where('school_id', Auth::guard('admin')->user()->id)->find($id);
		return view('admin.year.edit_year', compact('editData'));
	}


	public function StudentYearUpdate(Request $request, $id)
	{

		$data = StudentYear::where('school_id',Auth::guard('admin')->user()->id)->find($id);

		$validatedData = $request->validate([
			'name' => 'required|unique:student_years,name,' . $data->id

		]);


		$data->name = $request->name;
		$data->save();

		$notification = array(
			'message' => 'Student Year Updated Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('student.year.view')->with($notification);
	}



	public function StudentYearDelete($id)
	{
		$user = StudentYear::where('school_id',Auth::guard('admin')->user()->id)->find($id);
		$user->delete();

		$notification = array(
			'message' => 'Student Year Deleted Successfully',
			'alert-type' => 'info'
		);

		return redirect()->route('student.year.view')->with($notification);
	}
}
