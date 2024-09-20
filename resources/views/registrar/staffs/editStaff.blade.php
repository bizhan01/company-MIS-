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
         <form action="{{url('staff', [$staff->id])}}" method="POST">
         <input type="hidden" name="_method" value="PUT">
         {{ csrf_field() }}
         <div class="row form-group">
             <div class="col-md-3">
               <label for="profession" style="color: black">اسم</label>
               <input type="text" name="name"  value="{{$staff->name}}"  class="form-control" placeholder="اسم"  required>
             </div>
             <div class="col-md-3">
               <label for="fullName" style="color: black">اسم پدر</label>
               <input type="text" name="fName" value="{{$staff->fName}}"   class="form-control" placeholder="اسم پدر" required>
             </div>
             <div class="col-md-3">
               <label for="profession" style="color: black">تاریخ تولد</label>
               <input type="date" name="dob" value="{{$staff->dob}}"   class="form-control" placeholder="0000/00/00" required>
             </div>
             <div class="col-md-3">
               <label for="profession" style="color: black">درجه تحصل</label>
               <input type="text" name="degree" value="{{$staff->degree}}"   class="form-control" placeholder="درجه تحصل" required>
             </div>
           </div>

           <div class="row form-group">
               <div class="col-md-3">
                 <label for="profession" style="color: black">نهاد تحصلی</label>
                 <input type="text" name="school" value="{{$staff->school}}"    class="form-control" placeholder="نهاد تحصلی"  required>
               </div>
               <div class="col-md-3">
                 <label for="fullName" style="color: black">تاریخ فراغت</label>
                 <input type="date" name="graduation" value="{{$staff->graduation}}"   class="form-control" placeholder="تاریخ فراغت" required>
               </div>
               <div class="col-md-3">
                 <label for="profession" style="color: black">تجربه کاری</label>
                 <input type="number" name="experience"  value="{{$staff->experience}}"   class="form-control" placeholder="تجربه کاری" required>
               </div>
               <div class="col-md-3">
                 <label for="profession" style="color: black">پست پشنهادی</label>
                 <input type="text" name="position" value="{{$staff->position}}"    class="form-control" placeholder="پست پشنهادی" required>
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
