<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Staff;
use DB;


class StaffController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
      $staffs = Staff::latest()->get();

      return view('registrar.staffs.addStaff', compact('staffs',));
    }

    public function staffList()
    {
      $staffs = Staff::latest()->get();

      return view('registrar.staffs.staffList', compact('staffs',));
    }

    public function staffListForAdmin()
    {
      $staffs = Staff::latest()->get();

      return view('admin.reports.staffList', compact('staffs',));
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $this->validate(request(),[
          'name'=>'required',
          'fName' => 'required',
          'dob' => 'required',
          'degree' => 'required',
          'school' => 'required',
          'graduation' => 'required',
          'experience' => 'required',
          'position' => 'required',

    ]);
      Staff::create([
          'name' => request('name'),
          'fName' => request('fName'),
          'dob' => request('dob'),
          'degree' => request('degree'),
          'school' => request('school'),
          'graduation' => request('graduation'),
          'experience' => request('experience'),
          'position' => request('position'),
          'created_at'=>carbon::now(),
          'updated_at'=>carbon::now(),
        ]);

          try {
        session()->flash('success', 'عملیات موافقانه اجرا شد ');
        return back();
        } catch(Exception $ex) {
        session()->flash('failed', 'خطا! دوباره کوشش کنید');
        return back();
      }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        return view('registrar.staffs.editStaff',compact('staff',$staff));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Staff $staff)
    {
        //Validate
        $request->validate([
          'name'=>'required',
          'fName' => 'required',
          'dob' => 'required',
          'degree' => 'required',
          'school' => 'required',
          'graduation' => 'required',
          'experience' => 'required',
          'position' => 'required',
        ]);

        $staff->name = $request->name;
        $staff->fName = $request->fName;
        $staff->dob = $request->dob;
        $staff->degree = $request->degree;
        $staff->school = $request->school;
        $staff->graduation = $request->graduation;
        $staff->experience = $request->experience;
        $staff->position = $request->position;
        $staff->save();
        $request->session()->flash('message', 'Successfully modified the task!');
        return redirect('/staffList');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Staff $staff)
    {
        $staff->delete();
        $request->session()->flash('message', 'Successfully deleted the task!');
        return redirect('/staffList');
    }
}
