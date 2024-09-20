<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Document;
use DB;


class DocumentController extends Controller
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
      $documents = Document::latest()->get();

      return view('registrar.documents.addDocument', compact('documents',));
    }

    public function inDocList()
    {
      $documents = DB::table('documents')->where('type', 0)->latest()->get();

      return view('registrar.documents.inDocList', compact('documents',));
    }

    public function  outDocList()
    {
      $documents = DB::table('documents')->where('type', 1)->latest()->get();

      return view('registrar.documents.outDocList', compact('documents',));
    }

    public function inDocListForAdmin()
    {
      $documents = DB::table('documents')->where('type', 0)->latest()->get();

      return view('admin.reports.inDocList', compact('documents',));
    }

    public function  outDocListForAdmin()
    {
      $documents = DB::table('documents')->where('type', 1)->latest()->get();

      return view('admin.reports.outDocList', compact('documents',));
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
          'subject'=>'required',
          'from'=>'required',
          'to'=>'required',
          'type'=>'required',
          'image' => 'image|mimes:jpeg,jpeg,png,jpg,gif|max:1999'
    ]);
    if($image = $request->file('image')){
      $new_name =rand() . '.' . $image-> getClientOriginalExtension();
      $image -> move(public_path("UploadedImages"), $new_name);
    }
    else {
      $new_name = 'about.png';
    }
      Document::create([
          'number' => request('number'),
          'date' => request('date'),
          'subject' => request('subject'),
          'from' => request('from'),
          'to' => request('to'),
          'type' => request('type'),
          'image' => $new_name,
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
    public function edit(Document $document)
    {
        return view('registrar.documents.editDocument',compact('document',$document));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        //Validate
        $request->validate([
          'number'=>'required',
          'date'=>'required',
          'subject'=>'required',
          'from'=>'required',
          'to'=>'required',
          'type'=>'required',

        ]);

        $document->number = $request->number;
        $document->date = $request->date;
        $document->subject = $request->subject;
        $document->from = $request->from;
        $document->to = $request->to;
        $document->type = $request->type;
        $document->image = $request->image;
        $document->save();
        $request->session()->flash('message', 'Successfully modified the task!');
        return redirect('/document');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Document $document)
    {
        $document->delete();
        $request->session()->flash('message', 'Successfully deleted the task!');
        return redirect('/document');
    }
}
