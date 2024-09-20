<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Tax;
use DB;


class TaxController extends Controller
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
      $taxes = Tax::latest();

      if($month =request('month')){
        $taxes->whereMonth('created_at', Carbon::parse($month)->month);
      }

      if($year=request('year')){
        $taxes->whereYear('created_at', $year);
      }
      $taxes = $taxes->get();

      $archives= Tax::selectRaw('year(created_at)year,monthname(created_at) month,COUNT(*)published')
      ->groupBy('year','month')
      ->orderByRaw('min(created_at)desc')
      ->get()
      ->ToArray();

      return view('finance.tax.tax', compact('taxes', 'archives'));
    }

    public function taxListForAdmin()
    {
      $taxes = Tax::latest();

      if($month =request('month')){
        $taxes->whereMonth('created_at', Carbon::parse($month)->month);
      }

      if($year=request('year')){
        $taxes->whereYear('created_at', $year);
      }
      $taxes = $taxes->get();

      $archives= Tax::selectRaw('year(created_at)year,monthname(created_at) month,COUNT(*)published')
      ->groupBy('year','month')
      ->orderByRaw('min(created_at)desc')
      ->get()
      ->ToArray();

      return view('admin.reports.tax', compact('taxes', 'archives'));
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
          'source'=>'required',
          'type'=>'required',
          'amount'=>'required',
    ]);
      Tax::create([
          'source' => request('source'),
          'type' => request('type'),
          'amount' => request('amount'),
          'detail' => request('detail'),
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
    public function edit(Tax $tax)
    {
        return view('finance.tax.editTax',compact('tax',$tax));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tax $tax)
    {
        //Validate
        $request->validate([
          'source'=>'required',
          'type'=>'required',
          'amount'=>'required',
        ]);

        $tax->source = $request->source;
        $tax->type = $request->type;
        $tax->amount = $request->amount;
        $tax->detail = $request->detail;
        $tax->save();
        $request->session()->flash('message', 'Successfully modified the task!');
        return redirect('/tax');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Tax $tax)
    {
        $tax->delete();
        $request->session()->flash('message', 'Successfully deleted the task!');
        return redirect('/tax');
    }
}
