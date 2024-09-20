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
      <center> <h3>ثبت تحویلی ها </h3> </center>
       <form method="POST" action="/receipt" enctype="multipart/form-data">
          {{ csrf_field() }}
        <div class="row form-group">
            <div class="col-md-6">
              <label for="profession" style="color: black">نمبر</label>
              <input type="number" min="1" name="number"   class="form-control" placeholder="نمبر"  required>
            </div>
            <div class="col-md-6">
              <label for="fullName" style="color: black">تاریخ</label>
              <input type="date" name="date"  class="form-control" placeholder="تاریخ" required>
            </div>
          </div>
        <div class="row form-group">
            <div class="col-md-4">
              <label for="profession" style="color: black">اسم استاد</label>
              <input type="text" name="name"   class="form-control" placeholder="اسم استاد"  required>
            </div>
            <div class="col-md-4">
              <label for="fullName" style="color: black">اسم پدر</label>
              <input type="text" name="fName"  class="form-control" placeholder="اسم پدر" required>
            </div>
            <div class="col-md-4">
              <label for="profession" style="color: black">اصول صنفی</label>
              <input type="number" min="1" name="doc1"   class="form-control" placeholder="اصول صنفی" required>
            </div>
          </div>

          <div class="row form-group">
              <div class="col-md-4">
                <label for="profession" style="color: black">لایحه وظایف</label>
                <input type="number" min="1" name="doc2"   class="form-control" placeholder="لایحه وظایف"  required>
              </div>
              <div class="col-md-4">
                <label for="fullName" style="color: black">ترق تعلیم</label>
                <input type="number" min="1" name="doc3"  class="form-control" placeholder="ترق تعلیم" required>
              </div>
              <div class="col-md-4">
                <label for="profession" style="color: black">کتاب مشاهدات</label>
                <input type="number" min="1" name="doc4"   class="form-control" placeholder="کتاب مشاهدات" required>
              </div>
            </div>

            <div class="row form-group">
                <div class="col-md-4">
                  <label style="color: black">کارت هویت</label>
                  <select class="form-control" name="doc5">
                    <option>دریافت شده</option>
                    <option>دریافت نشده</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <label  style="color: black">مکتوب معرفی</label>
                  <select class="form-control" name="doc6">
                    <option>دریافت شده</option>
                    <option>دریافت نشده</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <label for="profession" style="color: black">هدایت مقام</label>
                  <select class="form-control" name="doc7">
                    <option>دریافت شده</option>
                    <option>دریافت نشده</option>
                  </select>
                </div>
              </div>

              <div class="row form-group">
                  <div class="col-md-4">
                    <label  style="color: black">استعلام معرفی</label>
                    <select class="form-control" name="doc8">
                      <option>دریافت شده</option>
                      <option>دریافت نشده</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label  style="color: black">نقل قرارداد</label>
                    <select class="form-control" name="doc9">
                      <option>دریافت شده</option>
                      <option>دریافت نشده</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label  style="color: black">سایر ملزومات اداری</label>
                    <select class="form-control" name="doc10">
                      <option>دریافت شده</option>
                      <option>دریافت نشده</option>
                    </select>
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
