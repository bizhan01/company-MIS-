@extends('layouts.master')
@section('content')
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="col-lg-12 box box-block bg-white">
      <center><h3>لیست فارغان</h3></cente>
      <table class="table table-striped table-bordered dataTable" id="table-2">
        <thead>
          <tr>
            <th>اسم </th>
            <th>اسم پدر</th>
            <th>ولایت / سایت</th>
            <th>کورس</th>
            <th>شروع کورس</th>
            <th>ختم کورس</th>
            <th>ویرایش</th>
            <th>حذف</th>
          </tr>
        </thead>
        <tbody>
          @foreach($students as $student)
          <tr>
            <td>{{$student->name}}</td>
            <td>{{$student->fName}}</td>
            <td>{{$student->site}}</td>
            <td>{{$student->course}}</td>
            <td>{{$student->start}}</td>
            <td>{{$student->end}}</td>
            <td>
              <a href="{{ URL::to('student/' . $student->id . '/edit') }}"> <li class="fa fa-edit btn btn-info btn-rounded"></li> </a>
            </td>
            <td>
              <form action="{{url('student', [$student->id])}}" method="POST">
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
