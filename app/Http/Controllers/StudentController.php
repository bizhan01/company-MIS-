<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Student;
use DB;


class StudentController extends Controller
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
      $students = Student::latest()->get();

      return view('registrar.students.addStudent', compact('students',));
    }

    public function studentList()
    {
      $students = Student::latest()->get();

      return view('registrar.students.studentList', compact('students',));
    }

    public function studentListForAdmin()
    {
      $students = Student::latest()->get();

      return view('admin.reports.studentList', compact('students',));
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
          'site' => 'required',
          'course' => 'required',
          'start' => 'required',
          'end' => 'required',

    ]);
      Student::create([
          'name' => request('name'),
          'fName' => request('fName'),
          'site' => request('site'),
          'course' => request('course'),
          'start' => request('start'),
          'end' => request('end'),
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
    public function edit(Student $student)
    {
        return view('registrar.students.editStudent',compact('student',$student));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //Validate
        $request->validate([
          'name'=>'required',
          'fName' => 'required',
          'site' => 'required',
          'course' => 'required',
          'start' => 'required',
          'end' => 'required',
        ]);

        $student->name = $request->name;
        $student->fName = $request->fName;
        $student->site = $request->site;
        $student->course = $request->course;
        $student->start = $request->start;
        $student->end = $request->end;
        $student->save();
        $request->session()->flash('message', 'Successfully modified the task!');
        return redirect('/studentList');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Student $student)
    {
        $student->delete();
        $request->session()->flash('message', 'Successfully deleted the task!');
        return redirect('/studentList');
    }
}
