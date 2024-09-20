<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Revenue;
use App\Expense;
use App\Salary;
use App\Tax;
use App\User;
use DB;

class BalanceController extends Controller
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


          // Revenue part

         $revenues= Revenue::latest();

         if($month =request('month')){
           $revenues->whereMonth('date', Carbon::parse($month)->month);
         }

         if($year=request('year')){
           $revenues->whereYear('date', $year);
         }
         $revenues = $revenues->get();

         $archives1= Revenue::selectRaw('year(date)year,monthname(date) month,COUNT(*)published')
         ->groupBy('year','month')
         ->orderByRaw('min(date)desc')
         ->get()
         ->ToArray();


         $expenses= Expense::latest();

         if($month =request('month')){
           $expenses->whereMonth('date', Carbon::parse($month)->month);
         }

         if($year=request('year')){
           $expenses->whereYear('date', $year);
         }
         $expenses = $expenses->get();

         $archives2= Expense::selectRaw('year(date)year,monthname(date) month,COUNT(*)published')
         ->groupBy('year','month')
         ->orderByRaw('min(date)desc')
         ->get()
         ->ToArray();



         $salaries= Salary::latest();

         if($month =request('month')){
           $salaries->whereMonth('created_at', Carbon::parse($month)->month);
         }

         if($year=request('year')){
           $salaries->whereYear('created_at', $year);
         }
         $salaries = $salaries->get();

         $archives3= Salary::selectRaw('year(created_at)year,monthname(created_at) month,COUNT(*)published')
         ->groupBy('year','month')
         ->orderByRaw('min(created_at)desc')
         ->get()
         ->ToArray();

// taxes
         $taxes= Tax::latest();

         if($month =request('month')){
           $taxes->whereMonth('created_at', Carbon::parse($month)->month);
         }

         if($year=request('year')){
           $taxes->whereYear('created_at', $year);
         }
         $taxes = $taxes->get();

         $archives4= Tax::selectRaw('year(created_at)year,monthname(created_at) month,COUNT(*)published')
         ->groupBy('year','month')
         ->orderByRaw('min(created_at)desc')
         ->get()
         ->ToArray();

         return view('finance.balance.balance', compact('revenues', 'archives1', 'expenses' ,'archives2', 'salaries' ,'archives3', 'taxes' ,'archives4'));
       }

}
