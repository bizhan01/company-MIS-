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
      <center> <h3>ثبت اسناد وارده و صادره</h3> </center>
       <form method="POST" action="/document" enctype="multipart/form-data">
          {{ csrf_field() }}
        <div class="row form-group">
            <div class="col-md-4">
              <label for="profession" style="color: black">نمبر</label>
              <input type="number" min="1" name="number"   class="form-control" placeholder="نمبر"  required>
            </div>
            <div class="col-md-4">
              <label for="fullName" style="color: black">تاریخ</label>
              <input type="date" name="date"  class="form-control" placeholder="تاریخ" required>
            </div>
            <div class="col-md-4">
              <label for="profession" style="color: black">موضوع</label>
              <input type="text" name="subject"   class="form-control" placeholder="موضوع" required>
            </div>
          </div>

          <div class="row form-group">
              <div class="col-md-4">
                <label for="profession" style="color: black">از</label>
                <input type="text" name="from"   class="form-control" placeholder="از"  required>
              </div>
              <div class="col-md-4">
                <label for="fullName" style="color: black">به</label>
                <input type="text" name="to"  class="form-control" placeholder="به" required>
              </div>
              <div class="col-md-4">
                <label for="profession" style="color: black">نوع سند</label>
                <select class="form-control" name="type" required>
                  <option value="">انتخاب کنید</option>
                  <option value="0">وارده</option>
                  <option value="1">صادره</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="">عکس و یا اسکن سند</label>
              <input type="file"  name="image" id="input-file-now" class="dropify" />
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
