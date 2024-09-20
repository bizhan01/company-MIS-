@extends('layouts.master')
@section('content')
@include('registrar.aside')
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="col-lg-12 box box-block bg-white">
      <center><h3>لیست اسناد صادره</h3></cente>
      <table class="table table-striped table-bordered dataTable" id="table-2">
        <thead>
          <tr>
            <th>شماره</th>
            <th>تاریخ</th>
            <th>موضوع</th>
            <th>از</th>
            <th>به</th>
            <th>عکس</th>
            <th>ویرایش</th>
            <th>حذف</th>
          </tr>
        </thead>
        <tbody>
          @foreach($documents as $document)
          <tr>
            <td>{{$document->number}}</td>
            <td>{{$document->date}}</td>
            <td>{{$document->subject}}</td>
            <td>{{$document->from}}</td>
            <td>{{$document->to}}</td>
            <td><a href="/UploadedImages/{{$document->image}}"><img src="/UploadedImages/{{$document->image}}" height="30px" /></a></td>
            <td>
              <a href="{{ URL::to('document/' . $document->id . '/edit') }}"> <li class="fa fa-edit btn btn-info btn-rounded"></li> </a>
            </td>
            <td>
              <form action="{{url('document', [$document->id])}}" method="POST">
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
