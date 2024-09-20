<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Project;
use DB;


class ProjectController extends Controller
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
      $projects = Project::latest()->get();

      return view('registrar.projects.addProject', compact('projects',));
    }

    public function projectList()
    {
      $projects = Project::latest()->get();

      return view('registrar.projects.projectList', compact('projects',));
    }

    public function projectListForAdmin()
    {
      $projects = Project::latest()->get();

      return view('admin.reports.projectList', compact('projects',));
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
          'code'=>'required',
          'date'=>'required',
          'start'=>'required',
          'end'=>'required',
          'price'=>'required',
          'org'=>'required',
          'type'=>'required',
          'teacher'=>'required',
          'empolyee'=>'required',
          'site'=>'required',
          'payments'=>'required',

    ]);
      Project::create([
          'name' => request('name'),
          'code' => request('code'),
          'date' => request('date'),
          'start' => request('start'),
          'end' => request('end'),
          'price' => request('price'),
          'org' => request('org'),
          'type' => request('type'),
          'teacher' => request('teacher'),
          'empolyee' => request('empolyee'),
          'site' => request('site'),
          'payments' => request('payments'),
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
    public function edit(Project $project)
    {
        return view('registrar.projects.editProject',compact('project',$project));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //Validate
        $request->validate([
          'name'=>'required',
          'code'=>'required',
          'date'=>'required',
          'start'=>'required',
          'end'=>'required',
          'price'=>'required',
          'org'=>'required',
          'type'=>'required',
          'teacher'=>'required',
          'empolyee'=>'required',
          'site'=>'required',
          'payments'=>'required',
        ]);

        $project->name = $request->name;
        $project->code = $request->code;
        $project->date = $request->date;
        $project->end = $request->end;
        $project->price = $request->price;
        $project->org = $request->org;
        $project->type = $request->type;
        $project->teacher = $request->teacher;
        $project->empolyee = $request->empolyee;
        $project->site = $request->site;
        $project->payments = $request->payments;
        $project->save();
        $request->session()->flash('message', 'Successfully modified the task!');
        return redirect('/projectList');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Project $project)
    {
        $project->delete();
        $request->session()->flash('message', 'Successfully deleted the task!');
        return redirect('/projectList');
    }
}
