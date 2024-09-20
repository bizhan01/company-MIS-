@extends('layouts.master')
@section('content')
@include('registrar.aside')
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="box box-block bg-white">
      <!-- ّform start -->
      <!-- ُSuccess Flash Message -->
					@if($success = session('success'))
					<div class="alert alert-success alert-dismissible fade in" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
							</button>
							<div>{{$success}}</div>
					</div>
					@endif
      <center> <h3>ثبت محصلین</h3> </center>
       <form method="POST" action="/student" enctype="multipart/form-data">
          {{ csrf_field() }}
        <div class="row form-group">
            <div class="col-md-4">
              <label for="profession" style="color: black">اسم</label>
              <input type="text" name="name"   class="form-control" placeholder="اسم"  required>
            </div>
            <div class="col-md-4">
              <label for="fullName" style="color: black">اسم پدر</label>
              <input type="text" name="fName"  class="form-control" placeholder="اسم پدر" required>
            </div>
            <div class="col-md-4">
              <label for="profession" style="color: black">ولایت / سایت</label>
              <input type="text" name="site"   class="form-control" placeholder="ولایت / سایت" required>
            </div>
          </div>

          <div class="row form-group">
              <div class="col-md-4">
                <label for="profession" style="color: black">کورس</label>
                <input type="text" name="course"   class="form-control" placeholder="کورس"  required>
              </div>
              <div class="col-md-4">
                <label for="fullName" style="color: black">شروع</label>
                <input type="date" name="start"  class="form-control" placeholder="شروع" required>
              </div>
              <div class="col-md-4">
                <label for="profession" style="color: black">ختم</label>
                <input type="date" name="end"   class="form-control" placeholder="ختم" required>
              </div>
            </div>


          <div class="row form-group">
            <div class="col-md-6">
                <input type="submit" name="submit" value="ذخیره" class="btn btn-success ">
            </div>
          </div>
          @include('layouts.errors')
      </form>
      <!--Form End -->
    </div>
  </div>
</div>

@endsection
