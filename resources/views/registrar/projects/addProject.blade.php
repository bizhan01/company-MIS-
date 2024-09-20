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
      <center> <h3>ثبت پروژه</h3> </center>
       <form method="POST" action="/project" enctype="multipart/form-data">
          {{ csrf_field() }}
        <div class="row form-group">
            <div class="col-md-4">
              <label for="profession" style="color: black">اسم پروژه</label>
              <input type="text" name="name"   class="form-control" placeholder="اسم پروژه"  required>
            </div>
            <div class="col-md-4">
              <label for="fullName" style="color: black">کد پروژه</label>
              <input type="text" name="code"  class="form-control" placeholder="کد پروژه" required>
            </div>
            <div class="col-md-4">
              <label for="profession" style="color: black">تاریخ قرارداد</label>
              <input type="date" name="date"   class="form-control" placeholder="تاریخ قرارداد" required>
            </div>
          </div>

          <div class="row form-group">
              <div class="col-md-4">
                <label for="profession" style="color: black">شروع پروژه</label>
                <input type="date" name="start"  class="form-control"  placeholder="شروع پروژه" required>
              </div>
              <div class="col-md-4">
                <label for="fullName" style="color: black">ختم پروژه</label>
                <input type="date" name="end"  class="form-control" placeholder="ختم پروژه"  required>
              </div>
              <div class="col-md-4">
                <label for="profession" style="color: black">قیمت پروژه</label>
                <input type="number" min="1" name="price"   class="form-control" placeholder="مبلغ" required>
              </div>
            </div>

            <div class="row form-group">
                <div class="col-md-4">
                  <label style="color: black">ارگان قرارداد کننده</label>
                  <input type="text" name="org"  class="form-control" placeholder="ارگان قرارداد کننده"  required>
                </div>
                <div class="col-md-4">
                  <label  style="color: black">نوع پروژه (بخش)</label>
                  <input type="text" name="type"  class="form-control" placeholder="نوع پروژه (بخش)" required>
                </div>
                <div class="col-md-4">
                  <label for="profession" style="color: black">تعداد اساتید</label>
                  <input type="number" min="1" name="teacher"   class="form-control" placeholder="تعداد اساتید" required>
                </div>
              </div>

              <div class="row form-group">
                  <div class="col-md-4">
                    <label  style="color: black">تعداد کارمندان</label>
                    <input type="number" min="1" name="empolyee"   class="form-control" placeholder="تعداد کارمندان"  required>
                  </div>
                  <div class="col-md-4">
                    <label  style="color: black">تعداد سایت ها</label>
                    <input type="number" min="1" name="site"  class="form-control" placeholder="تعداد سایت ها" required>
                  </div>
                  <div class="col-md-4">
                    <label  style="color: black">اقساط</label>
                    <input type="number" min="1" name="payments"   class="form-control" placeholder="اقساط" required>
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
