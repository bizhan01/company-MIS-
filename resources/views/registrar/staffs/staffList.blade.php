@extends('layouts.master')
@section('content')
@include('registrar.aside')
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="col-lg-12 box box-block bg-white">
      <center><h3>لیست استخدام</h3></cente>
      <table class="table table-striped table-bordered dataTable" id="table-2">
        <thead>
          <tr>
            <th>اسم </th>
            <th>اسم پدر</th>
            <th>تاریخ تولد</th>
            <th>درجه تحصل</th>
            <th>نهاد تحصلی</th>
            <th>تاریخ فراغت</th>
            <th>تجربه کاری</th>
            <th>پست پشنهادی</th>
            <th>ویرایش</th>
            <th>حذف</th>
          </tr>
        </thead>
        <tbody>
          @foreach($staffs as $staff)
          <tr>
            <td>{{$staff->name}}</td>
            <td>{{$staff->fName}}</td>
            <td>{{$staff->dob}}</td>
            <td>{{$staff->degree}}</td>
            <td>{{$staff->school}}</td>
            <td>{{$staff->graduation}}</td>
            <td>{{$staff->experience}}</td>
            <td>{{$staff->position}}</td>
            <td>
              <a href="{{ URL::to('staff/' . $staff->id . '/edit') }}"> <li class="fa fa-edit btn btn-info btn-rounded"></li> </a>
            </td>
            <td>
              <form action="{{url('staff', [$staff->id])}}" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <button type="submit"  onclick='return confirm("حذف شود؟")' class="btn btn-danger btn-rounded fa fa-trash"></button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
