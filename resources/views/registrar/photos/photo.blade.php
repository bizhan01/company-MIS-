@extends('layouts.master')
@section('content')
@include('registrar.aside')
<div class="content-area py-1">
	<div class="container-fluid">
    <nav class="navbar navbar-light bg-white b-a mb-2">
      <!-- ُSuccess Flash Message -->
        @if($success = session('success'))
        <div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div>{{$success}}</div>
        </div>
        @endif
			<center><h3>اپلود نمودن اسناد محرم</h3></center>
			<form method="POST" action="/photo" enctype="multipart/form-data">
         {{ csrf_field() }}
        <div class="form-group">
          <input type="file"  name="image" id="input-file-now" class="dropify" />
        </div>
        <div class="form-group">
          <center><button type="submit" class="btn btn-rounded btn-lg btn-success"><li class="fa fa-save"> اپلود نمودن تصویر</li></button></center>
        </div>
      </form>
    </nav>
  </div>
</div>

<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="row mb-1">
    @foreach($photos as $photo)
      <div class="col-md-3">
        <div class="box bg-white product product-1">
          <div class="p-img img-cover" style="background-image: url(/UploadedImages/{{$photo->image}});">
            <div class="p-links">
              <a href="/UploadedImages/{{$photo->image}}"><i class="fa fa-plus"></i></a>
              <a  href = '' onclick='return confirm("حذف شود؟")'>
              <form action="{{url('photo', [$photo->id])}}" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <button type="submit"  onclick='return confirm("حذف شود؟")' class="btn btn-circle  fa fa-trash" style="color: red"></button>
              </form></a>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
