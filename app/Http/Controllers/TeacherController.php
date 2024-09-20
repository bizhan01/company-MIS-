<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Teacher;
use DB;


class TeacherController extends Controller
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
      $teachers = Teacher::latest()->get();

      return view('registrar.teachers.addTeacher', compact('teachers',));
    }

    public function inTchList()
    {
      $teachers = DB::table('teachers')->where('status', 1)->latest()->get();

      return view('registrar.teachers.inTchList', compact('teachers',));
    }

    public function  outTchList()
    {
      $teachers = DB::table('teachers')->where('status', 0)->latest()->get();

      return view('registrar.teachers.outTchList', compact('teachers',));
    }

    public function inTchListForAdmin()
    {
      $teachers = DB::table('teachers')->where('status', 1)->latest()->get();

      return view('admin.reports.inTchList', compact('teachers',));
    }

    public function  outTchListForAdmin()
    {
      $teachers = DB::table('teachers')->where('status', 0)->latest()->get();

      return view('admin.reports.outTchList', compact('teachers',));
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
      Teacher::create([
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
    public function edit(Teacher $teacher)
    {
        return view('registrar.teachers.editTeacher',compact('teacher',$teacher));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
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

        $teacher->name = $request->name;
        $teacher->lName = $request->lName;
        $teacher->fName = $request->fName;
        $teacher->dob = $request->dob;
        $teacher->province1 = $request->province1;
        $teacher->district1 = $request->district1;
        $teacher->region1 = $request->region1;
        $teacher->province2 = $request->province2;
        $teacher->district2 = $request->district2;
        $teacher->region2 = $request->region2;
        $teacher->position = $request->position;
        $teacher->tazkira = $request->tazkira;
        $teacher->start = $request->start;
        $teacher->end = $request->end;
        $teacher->TIN = $request->TIN;
        $teacher->phone = $request->phone;
        $teacher->status = $request->status;
        $teacher->save();
        $request->session()->flash('message', 'Successfully modified the task!');
        return redirect('/teacher');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Teacher $teacher)
    {
        $teacher->delete();
        $request->session()->flash('message', 'Successfully deleted the task!');
        return redirect('/teacher');
    }
}
