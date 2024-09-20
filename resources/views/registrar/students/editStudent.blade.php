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
         <form action="{{url('student', [$student->id])}}" method="POST">
         <input type="hidden" name="_method" value="PUT">
         {{ csrf_field() }}
         <div class="row form-group">
             <div class="col-md-4">
               <label for="profession" style="color: black">اسم</label>
               <input type="text" name="name" value="{{$student->name}}"  class="form-control" placeholder="اسم"  required>
             </div>
             <div class="col-md-4">
               <label for="fullName" style="color: black">اسم پدر</label>
               <input type="text" name="fName" value="{{$student->fName}}"  class="form-control" placeholder="اسم پدر" required>
             </div>
             <div class="col-md-4">
               <label for="profession" style="color: black">ولایت / سایت</label>
               <input type="text" name="site" value="{{$student->site}}"  class="form-control" placeholder="ولایت / سایت" required>
             </div>
           </div>

           <div class="row form-group">
               <div class="col-md-4">
                 <label for="profession" style="color: black">کورس</label>
                 <input type="text" name="course"  value="{{$student->course}}"  class="form-control" placeholder="کورس"  required>
               </div>
               <div class="col-md-4">
                 <label for="fullName" style="color: black">شروع</label>
                 <input type="date" name="start" value="{{$student->start}}" class="form-control" placeholder="شروع" required>
               </div>
               <div class="col-md-4">
                 <label for="profession" style="color: black">ختم</label>
                 <input type="date" name="end" value="{{$student->end}}"  class="form-control" placeholder="ختم" required>
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
