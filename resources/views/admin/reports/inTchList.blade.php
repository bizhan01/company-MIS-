@extends('layouts.master')
@section('content')
<div class="box box-block bg-white">
  <center><h3>لیست اساتید برحال</h3></cente>
         <div class="table-responsive">
             <table class="table table-info table-bordered table-striped">
                <thead>
                   <tr>
                      <th data-priority="3">اسم</th>
                      <th data-priority="1">تخلص</th>
                      <th data-priority="3">اسم پدر</th>
                      <th data-priority="3">تاریخ تولد</th>
                      <th data-priority="6">سکونت اصلی</th>
                      <th data-priority="6">سکونت فعلی</th>
                      <th data-priority="6">وظیفه</th>
                      <th data-priority="6">نمبر تذکره</th>
                      <th data-priority="6">شروع قرارداد</th>
                      <th data-priority="6">ختم قرارداد</th>
                      <th data-priority="6">TIN</th>
                      <th data-priority="6">شماره تماس</th>
                      <th data-priority="6">ویرایش</th>
                      <th data-priority="6">حذف</th>
                   </tr>
                </thead>
                <tbody>
                  @foreach($teachers as $teacher)
                   <tr>
                     <td>{{$teacher->name}}</td>
                     <td>{{$teacher->lName}}</td>
                     <td>{{$teacher->fName}}</td>
                     <td>{{$teacher->dob}}</td>
                     <td>{{$teacher->province1}}-{{$teacher->district1}}-{{$teacher->region1}}</td>
                     <td>{{$teacher->province2}}-{{$teacher->district2}}-{{$teacher->region2}}</td>
                     <td>{{$teacher->position}}</td>
                     <td>{{$teacher->tazkira}}</td>
                     <td>{{$teacher->start}}</td>
                     <td>{{$teacher->end}}</td>
                     <td>{{$teacher->TIN}}</td>
                     <td style="direction: ltr">{{$teacher->phone}}</td>
                     <td>
                       <a href="{{ URL::to('teacher/' . $teacher->id . '/edit') }}"> <li class=" btn btn-rounded btn-info fa fa-edit"></li></a>
                      </td>
                      <td>
                        <form action="{{url('teacher', [$teacher->id])}}" method="POST">
                          <input type="hidden" name="_method" value="DELETE">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit"  onclick='return confirm("حذف شود؟")' class="btn btn-rounded btn-danger"><li class="fa fa-trash"></li></button>
                        </form>
                       </td>
                   </tr>
                   @endforeach
                </tbody>
             </table>
        </div>
</div>

@endsection
