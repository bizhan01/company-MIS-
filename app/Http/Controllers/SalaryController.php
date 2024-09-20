<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Salary;
use DB;


class SalaryController extends Controller
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
      $salaries = Salary::latest();

      if($month =request('month')){
        $salaries->whereMonth('date', Carbon::parse($month)->month);
      }

      if($year=request('year')){
        $salaries->whereYear('date', $year);
      }
      $salaries = $salaries->get();

      $archives= Salary::selectRaw('year(date)year,monthname(date) month,COUNT(*)published')
      ->groupBy('year','month')
      ->orderByRaw('min(date)desc')
      ->get()
      ->ToArray();

      return view('finance.salary.salary', compact('salaries', 'archives'));
    }


    public function salaryListForAdmin()
    {
      $salaries = Salary::latest();

      if($month =request('month')){
        $salaries->whereMonth('date', Carbon::parse($month)->month);
      }

      if($year=request('year')){
        $salaries->whereYear('date', $year);
      }
      $salaries = $salaries->get();

      $archives= Salary::selectRaw('year(date)year,monthname(date) month,COUNT(*)published')
      ->groupBy('year','month')
      ->orderByRaw('min(date)desc')
      ->get()
      ->ToArray();

      return view('admin.reports.salary', compact('salaries', 'archives'));
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
          'date'=>'required',
          'name'=>'required',
          'fName'=>'required',
          'salary'=>'required',
          'paid'=>'required',
          'rest'=>'required',


    ]);
      Salary::create([
          'date' => request('date'),
          'name' => request('name'),
          'fName' => request('fName'),
          'salary' => request('salary'),
          'paid' => request('paid'),
          'rest' => request('rest'),
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
    public function edit(Salary $salary)
    {
        return view('finance.salary.editSalary',compact('salary',$salary));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salary $salary)
    {
        //Validate
        $request->validate([
          'date'=>'required',
          'name'=>'required',
          'fName'=>'required',
          'salary'=>'required',
          'paid'=>'required',
          'rest'=>'required',
        ]);

        $salary->date = $request->date;
        $salary->name = $request->name;
        $salary->fName = $request->fName;
        $salary->salary = $request->salary;
        $salary->paid = $request->paid;
        $salary->rest = $request->rest;
        $salary->save();
        $request->session()->flash('message', 'Successfully modified the task!');
        return redirect('/salary');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Salary $salary)
    {
        $salary->delete();
        $request->session()->flash('message', 'Successfully deleted the task!');
        return redirect('/salary');
    }
}
