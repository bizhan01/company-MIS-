@extends('layouts.master')
@section('content')
<div class="box box-block bg-white">
  <center><h3>لیست کارمندان برحال</h3></cente>
         <div class="table-responsive">
             <table class="table table-success table-bordered table-striped">
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
                  @foreach($employees as $employee)
                   <tr>
                     <td>{{$employee->name}}</td>
                     <td>{{$employee->lName}}</td>
                     <td>{{$employee->fName}}</td>
                     <td>{{$employee->dob}}</td>
                     <td>{{$employee->province1}}-{{$employee->district1}}-{{$employee->region1}}</td>
                     <td>{{$employee->province2}}-{{$employee->district2}}-{{$employee->region2}}</td>
                     <td>{{$employee->position}}</td>
                     <td>{{$employee->tazkira}}</td>
                     <td>{{$employee->start}}</td>
                     <td>{{$employee->end}}</td>
                     <td>{{$employee->TIN}}</td>
                     <td style="direction: ltr">{{$employee->phone}}</td>
                     <td>
                       <a href="{{ URL::to('employees/' . $employee->id . '/edit') }}"> <li class=" btn btn-rounded btn-info fa fa-edit"></li></a>
                      </td>
                      <td>
                        <form action="{{url('employees', [$employee->id])}}" method="POST">
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
