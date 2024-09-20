@extends('layouts.master')
@section('content')
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
	<center><h3>لیست اسناد محرم</h3></cente>
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
