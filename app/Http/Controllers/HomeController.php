<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Employee;
use App\User;
use App\Revenue;
use App\Expense;
use App\Salary;
use App\Tax;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $revenues = DB::table('revenues')->whereMonth('date', Carbon::now())->sum('amount');
        $expenses = DB::table('expenses')->whereMonth('date', Carbon::now())->sum('total');
        $salaries = DB::table('salaries')->whereMonth('date', Carbon::now())->sum('paid');
        $taxes = DB::table('taxes')->whereMonth('created_at', Carbon::now())->sum('amount');
        $empolyeeCount = DB::table('employees')->where('status', 1)->count('id');
        $teachers = DB::table('teachers')->where('status', 1)->count('id');
        $students = DB::table('students')->count('id');
        $projects = DB::table('projects')->count('id');
        return view('home', compact('revenues', 'expenses', 'salaries', 'taxes',  'empolyeeCount', 'teachers', 'students', 'projects'));
    }
}
