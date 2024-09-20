<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Receipt;
use DB;


class ReceiptController extends Controller
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
      $receipts = Receipt::latest()->get();

      return view('registrar.receipts.addReceipt', compact('receipts',));
    }

    public function receiptList()
    {
      $receipts = Receipt::latest()->get();

      return view('registrar.receipts.receiptList', compact('receipts',));
    }

    public function receiptListForAdmin()
    {
      $receipts = Receipt::latest()->get();

      return view('admin.reports.receiptList', compact('receipts',));
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
          'number'=>'required',
          'date'=>'required',
          'name'=>'required',
          'fName'=>'required',
          'doc1'=>'required',
          'doc2'=>'required',
          'doc3'=>'required',
          'doc4'=>'required',
          'doc5'=>'required',
          'doc6'=>'required',
          'doc7'=>'required',
          'doc8'=>'required',
          'doc9'=>'required',
          'doc10'=>'required',


    ]);
      Receipt::create([
          'number' => request('number'),
          'date' => request('date'),
          'name' => request('name'),
          'fName' => request('fName'),
          'doc1' => request('doc1'),
          'doc2' => request('doc2'),
          'doc3' => request('doc3'),
          'doc4' => request('doc4'),
          'doc5' => request('doc5'),
          'doc6' => request('doc6'),
          'doc7' => request('doc7'),
          'doc8' => request('doc8'),
          'doc9' => request('doc9'),
          'doc10' => request('doc10'),
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
    public function edit(Receipt $receipt)
    {
        return view('registrar.receipts.editReceipt',compact('receipt',$receipt));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receipt $receipt)
    {
        //Validate
        $request->validate([
          'number'=>'required',
          'date'=>'required',
          'name'=>'required',
          'fName'=>'required',
          'doc1'=>'required',
          'doc2'=>'required',
          'doc3'=>'required',
          'doc4'=>'required',
          'doc5'=>'required',
          'doc6'=>'required',
          'doc7'=>'required',
          'doc8'=>'required',
          'doc9'=>'required',
          'doc10'=>'required',

        ]);

        $receipt->number = $request->number;
        $receipt->date = $request->date;
        $receipt->name = $request->name;
        $receipt->fName = $request->fName;
        $receipt->doc1 = $request->doc1;
        $receipt->doc2 = $request->doc2;
        $receipt->doc3 = $request->doc3;
        $receipt->doc4 = $request->doc4;
        $receipt->doc5 = $request->doc5;
        $receipt->doc6 = $request->doc6;
        $receipt->doc7 = $request->doc7;
        $receipt->doc8 = $request->doc8;
        $receipt->doc9 = $request->doc9;
        $receipt->doc10 = $request->doc10;
        $receipt->save();
        $request->session()->flash('message', 'Successfully modified the task!');
        return redirect('/receiptList');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Receipt $receipt)
    {
        $receipt->delete();
        $request->session()->flash('message', 'Successfully deleted the task!');
        return redirect('/receiptList');
    }
}
