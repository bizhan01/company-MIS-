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
      <center> <h3>استخدام پرسونل</h3> </center>
       <form method="POST" action="/staff" enctype="multipart/form-data">
          {{ csrf_field() }}
        <div class="row form-group">
            <div class="col-md-3">
              <label for="profession" style="color: black">اسم</label>
              <input type="text" name="name"   class="form-control" placeholder="اسم"  required>
            </div>
            <div class="col-md-3">
              <label for="fullName" style="color: black">اسم پدر</label>
              <input type="text" name="fName"  class="form-control" placeholder="اسم پدر" required>
            </div>
            <div class="col-md-3">
              <label for="profession" style="color: black">تاریخ تولد</label>
              <input type="date" name="dob"   class="form-control" placeholder="0000/00/00" required>
            </div>
            <div class="col-md-3">
              <label for="profession" style="color: black">درجه تحصل</label>
              <input type="text" name="degree"   class="form-control" placeholder="درجه تحصل" required>
            </div>
          </div>

          <div class="row form-group">
              <div class="col-md-3">
                <label for="profession" style="color: black">نهاد تحصلی</label>
                <input type="text" name="school"   class="form-control" placeholder="نهاد تحصلی"  required>
              </div>
              <div class="col-md-3">
                <label for="fullName" style="color: black">تاریخ فراغت</label>
                <input type="date" name="graduation"  class="form-control" placeholder="تاریخ فراغت" required>
              </div>
              <div class="col-md-3">
                <label for="profession" style="color: black">تجربه کاری</label>
                <input type="number" name="experience"   class="form-control" placeholder="تجربه کاری" required>
              </div>
              <div class="col-md-3">
                <label for="profession" style="color: black">پست پشنهادی</label>
                <input type="text" name="position"   class="form-control" placeholder="پست پشنهادی" required>
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
