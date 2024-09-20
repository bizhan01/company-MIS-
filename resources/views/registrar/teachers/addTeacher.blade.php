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
          <center> <h3>ثبت کارمند جدید</h3> </center>
           <form method="POST" action="/teacher" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="row form-group">
                  <h4 style="margin-right: 15px">معلومات شخصی</h4>
                 <div class="col-md-3">
                   <label  for="Field of Study" style="color:black">اسم</label>
                   <input type="text"  name="name" class="form-control" placeholder="اسم" required>
                 </div>
                 <div class="col-md-3">
                   <label  for="University Name" style="color:black">تخلص</label>
                   <input type="text"  name="lName" class="form-control" placeholder="تخلص" required>
                 </div>
                 <div class="col-md-3">
                   <label  for="University Name" style="color:black">اسم پدر</label>
                   <input type="text"  name="fName" class="form-control" placeholder="اسم پدر" required>
                 </div>
                 <div class="col-md-3">
                   <label  for="University Name" style="color:black">تاریخ تولد</label>
                   <input type="date"  name="dob" class="form-control"  required>
                 </div>
              </div>

              <div class="row form-group">
                  <h4 style="margin-right: 15px">سکونت اصلی</h4>
                 <div class="col-md-4">
                   <label  for="Field of Study" style="color:black">ولایت </label>
                   <input type="text"  name="province1" class="form-control" placeholder="ولایت" required>
                 </div>
                 <div class="col-md-4">
                   <label  for="University Name" style="color:black">ولسوالی</label>
                   <input type="text"  name="district1" class="form-control" placeholder="ولسوالی" required>
                 </div>
                 <div class="col-md-4">
                   <label  for="University Name" style="color:black">ناحیه / قریه</label>
                   <input type="text"  name="region1" class="form-control" placeholder="ناحیه / قریه" required>
                 </div>
              </div>

              <div class="row form-group">
                  <h4 style="margin-right: 15px">سکونت فعلی</h4>
                 <div class="col-md-4 ">
                   <label  for="Field of Study" style="color:black">ولایت </label>
                   <input type="text"  name="province2" class="form-control" placeholder="ولایت" required>
                 </div>
                 <div class="col-md-4">
                   <label  for="University Name" style="color:black">ولسوالی</label>
                   <input type="text"  name="district2" class="form-control" placeholder="ولسوالی" required>
                 </div>
                 <div class="col-md-4">
                   <label  for="University Name" style="color:black">ناحیه / قریه</label>
                   <input type="text"  name="region2" class="form-control" placeholder="ناحیه / قریه" required>
                 </div>
              </div>

              <div class="row form-group">
                <h4 style="margin-right: 15px">معلومات کاری</h4>
               <div class="col-md-4 ">
                 <label  for="Field of Study" style="color:black">وظیفه</label>
                 <input type="text"  name="position" class="form-control" placeholder="وظیفه" required>
               </div>
               <div class="col-md-4">
                 <label  for="University Name" style="color:black">نمبر تذکره</label>
                 <input type="number"  name="tazkira" class="form-control" placeholder="نمبر تذکره" required>
               </div>
               <div class="col-md-4">
                 <label  for="University Name" style="color:black">شروع قرارداد</label>
                 <input type="date"  name="start" class="form-control" placeholder="شروع قرارداد" required>
               </div>
              </div>

              <div class="row form-group">
                <div class="col-md-4">
                  <label  for="University Name" style="color:black">ختم قرارداد</label>
                  <input type="date"  name="end" class="form-control" placeholder="ختم قرارداد" required>
                </div>
                <div class="col-md-4">
                  <label  for="University Name" style="color:black">TIN</label>
                  <input type="number" min="1"  name="TIN" class="form-control" placeholder="TIN" required>
                </div>
                 <div class="col-md-4" >
                   <label  for="Field of Study" style="color:black">تلفن </label>
                   <input type="text" name="phone" placeholder="(999) 999-9999" data-mask="(999) 999-9999" class="form-control" style="direction: ltr" required>
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
