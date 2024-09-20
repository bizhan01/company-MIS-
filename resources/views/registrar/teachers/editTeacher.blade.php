@extends('layouts.master')
@section('content')
@include('registrar.aside')
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="box box-block bg-white">
      <!-- ّform start -->
        <h1>ویرایش رکورد</h1>
        <hr>
         <form action="{{url('teacher', [$teacher->id])}}" method="POST">
         <input type="hidden" name="_method" value="PUT">
         {{ csrf_field() }}
         <div class="row form-group">
             <h4 style="margin-right: 15px">معلومات شخصی</h4>
            <div class="col-md-3">
              <label  for="Field of Study" style="color:black">اسم</label>
              <input type="text"  name="name" value="{{$teacher->name}}" class="form-control" placeholder="اسم" required>
            </div>
            <div class="col-md-3">
              <label  for="University Name" style="color:black">تخلص</label>
              <input type="text"  name="lName" value="{{$teacher->lName}}" class="form-control" placeholder="تخلص" required>
            </div>
            <div class="col-md-3">
              <label  for="University Name" style="color:black">اسم پدر</label>
              <input type="text"  name="fName" value="{{$teacher->fName}}" class="form-control" placeholder="اسم پدر" required>
            </div>
            <div class="col-md-3">
              <label  for="University Name" style="color:black">تاریخ تولد</label>
              <input type="date"  name="dob" value="{{$teacher->dob}}" class="form-control"  required>
            </div>
         </div>

         <div class="row form-group">
             <h4 style="margin-right: 15px">سکونت اصلی</h4>
            <div class="col-md-4">
              <label  for="Field of Study" style="color:black">ولایت </label>
              <input type="text"  name="province1" value="{{$teacher->province1}}" class="form-control" placeholder="ولایت" required>
            </div>
            <div class="col-md-4">
              <label  for="University Name" style="color:black">ولسوالی</label>
              <input type="text"  name="district1" value="{{$teacher->district1}}" class="form-control" placeholder="ولسوالی" required>
            </div>
            <div class="col-md-4">
              <label  for="University Name" style="color:black">ناحیه / قریه</label>
              <input type="text"  name="region1" value="{{$teacher->region1}}" class="form-control" placeholder="ناحیه / قریه" required>
            </div>
         </div>

         <div class="row form-group">
             <h4 style="margin-right: 15px">سکونت فعلی</h4>
            <div class="col-md-4 ">
              <label  for="Field of Study" style="color:black">ولایت </label>
              <input type="text"  name="province2" value="{{$teacher->province2}}" class="form-control" placeholder="ولایت" required>
            </div>
            <div class="col-md-4">
              <label  for="University Name" style="color:black">ولسوالی</label>
              <input type="text"  name="district2" value="{{$teacher->district2}}" class="form-control" placeholder="ولسوالی" required>
            </div>
            <div class="col-md-4">
              <label  for="University Name" style="color:black">ناحیه / قریه</label>
              <input type="text"  name="region2" value="{{$teacher->region2}}" class="form-control" placeholder="ناحیه / قریه" required>
            </div>
         </div>

         <div class="row form-group">
           <h4 style="margin-right: 15px">معلومات کاری</h4>
          <div class="col-md-4 ">
            <label  for="Field of Study" style="color:black">وظیفه</label>
            <input type="text"  name="position" value="{{$teacher->position}}" class="form-control" placeholder="وظیفه" required>
          </div>
          <div class="col-md-4">
            <label  for="University Name" style="color:black">نمبر تذکره</label>
            <input type="number"  name="tazkira" value="{{$teacher->tazkira}}" class="form-control" placeholder="نمبر تذکره" required>
          </div>
          <div class="col-md-4">
            <label  for="University Name" style="color:black">شروع قرارداد</label>
            <input type="date"  name="start" value="{{$teacher->start}}" class="form-control" placeholder="شروع قرارداد" required>
          </div>
         </div>

         <div class="row form-group">
           <div class="col-md-4">
             <label  for="University Name" style="color:black">ختم قرارداد</label>
             <input type="date"  name="end" value="{{$teacher->end}}" class="form-control" placeholder="ختم قرارداد" required>
           </div>
           <div class="col-md-4">
             <label  for="University Name" style="color:black">TIN</label>
             <input type="number" min="1"  name="TIN" value="{{$teacher->TIN}}" class="form-control" placeholder="TIN" required>
           </div>
            <div class="col-md-4" >
              <label  for="Field of Study" style="color:black">تلفن </label>
              <input type="text" name="phone" value="{{$teacher->phone}}" placeholder="(999) 999-9999" data-mask="(999) 999-9999" class="form-control" style="direction: ltr" required>
            </div>
         </div>
       <div class="row form-group">
         <div class="col-lg-4">
           <div class="wrap-input100 validate-input" data-validate = "Pleas Select Your Acount Type">
             <span class="label-input100">وضیعت کارمند</span> <br>
             <input class="" type="radio" name="status"  id="isAdmin" value="1" checked>
             <span class="label-input100">برحال</span> &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;
             <input  type="radio"   name="status" id="isAdmin" value="0" >
             <span class="label-input100">منفک</span>
           </div>
         </div>
        </div>


         @include('layouts.errors')
         <button type="submit" class="btn btn-success">ویرایش رکورد</button>
        <button type="reset" class="btn btn-primary">لغو</button>
        </form>
        <!--Form End -->
      </div>
  </div>
</div>
@endsection
