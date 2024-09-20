<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Employee;
use DB;


class EmployeeController extends Controller
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
      $employees = Employee::latest()->get();

      return view('registrar.employees.addEmployee', compact('employees',));
    }

    public function inEmpList()
    {
      $employees = DB::table('employees')->where('status', 1)->latest()->get();

      return view('registrar.employees.inEmpList', compact('employees',));
    }

    public function  outEmpList()
    {
      $employees = DB::table('employees')->where('status', 0)->latest()->get();

      return view('registrar.employees.outEmpList', compact('employees',));
    }

    public function inEmpListForAdmin()
    {
      $employees = DB::table('employees')->where('status', 1)->latest()->get();

      return view('admin.reports.inEmpList', compact('employees',));
    }

    public function  outEmpListForAdmin()
    {
      $employees = DB::table('employees')->where('status', 0)->latest()->get();

      return view('admin.reports.outEmpList', compact('employees',));
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
          'name' => 'required',
          'lName' => 'required',
          'fName' => 'required',
          'dob' => 'required',
          'province1' => 'required',
          'district1' => 'required',
          'region1' => 'required',
          'province2' => 'required',
          'district2' =>'required',
          'region2' => 'required',
          'position' => 'required',
          'tazkira' => 'required',
          'start' => 'required',
          'end' => 'required',
          'TIN' => 'required',
          'phone' => 'required',
    ]);
      Employee::create([
          'name' => request('name'),
          'lName' => request('lName'),
          'fName' => request('fName'),
          'dob' => request('dob'),
          'province1' => request('province1'),
          'district1' => request('district1'),
          'region1' => request('region1'),
          'province2' => request('province2'),
          'district2' => request('district2'),
          'region2' => request('region2'),
          'position' => request('position'),
          'tazkira' => request('tazkira'),
          'start' => request('start'),
          'end' => request('end'),
          'TIN' => request('TIN'),
          'phone' => request('phone'),
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
    public function edit(Employee $employee)
    {
        return view('registrar.employees.editEmployee',compact('employee',$employee));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //Validate
        $request->validate([
          'name' => 'required',
          'lName' => 'required',
          'fName' => 'required',
          'dob' => 'required',
          'province1' => 'required',
          'district1' => 'required',
          'region1' => 'required',
          'province2' => 'required',
          'district2' =>'required',
          'region2' => 'required',
          'position' => 'required',
          'tazkira' => 'required',
          'start' => 'required',
          'end' => 'required',
          'TIN' => 'required',
          'phone' => 'required',
          'status' => 'required',

        ]);

        $employee->name = $request->name;
        $employee->lName = $request->lName;
        $employee->fName = $request->fName;
        $employee->dob = $request->dob;
        $employee->province1 = $request->province1;
        $employee->district1 = $request->district1;
        $employee->region1 = $request->region1;
        $employee->province2 = $request->province2;
        $employee->district2 = $request->district2;
        $employee->region2 = $request->region2;
        $employee->position = $request->position;
        $employee->tazkira = $request->tazkira;
        $employee->start = $request->start;
        $employee->end = $request->end;
        $employee->TIN = $request->TIN;
        $employee->phone = $request->phone;
        $employee->status = $request->status;
        $employee->save();
        $request->session()->flash('message', 'Successfully modified the task!');
        return redirect('/employee');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Employee $employee)
    {
        $employee->delete();
        $request->session()->flash('message', 'Successfully deleted the task!');
        return redirect('/employee');
    }
}
