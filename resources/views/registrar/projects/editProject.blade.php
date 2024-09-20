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
         <form action="{{url('project', [$project->id])}}" method="POST">
         <input type="hidden" name="_method" value="PUT">
         {{ csrf_field() }}
         <div class="row form-group">
             <div class="col-md-4">
               <label for="profession" style="color: black">اسم پروژه</label>
               <input type="text" name="name" value="{{$project->name}}"  class="form-control" placeholder="اسم پروژه"  required>
             </div>
             <div class="col-md-4">
               <label for="fullName" style="color: black">کد پروژه</label>
               <input type="text" name="code" value="{{$project->code}}" class="form-control" placeholder="کد پروژه" required>
             </div>
             <div class="col-md-4">
               <label for="profession" style="color: black">تاریخ قرارداد</label>
               <input type="date" name="date" value="{{$project->date}}"  class="form-control" placeholder="تاریخ قرارداد" required>
             </div>
           </div>

           <div class="row form-group">
               <div class="col-md-4">
                 <label for="profession" style="color: black">شروع پروژه</label>
                 <input type="date" name="start" value="{{$project->start}}"  class="form-control"  placeholder="شروع پروژه" required>
               </div>
               <div class="col-md-4">
                 <label for="fullName" style="color: black">ختم پروژه</label>
                 <input type="date" name="end" value="{{$project->end}}" class="form-control" placeholder="ختم پروژه"  required>
               </div>
               <div class="col-md-4">
                 <label for="profession" style="color: black">قیمت پروژه</label>
                 <input type="number" name="price" value="{{$project->price}}"  class="form-control" placeholder="مبلغ" required>
               </div>
             </div>

             <div class="row form-group">
                 <div class="col-md-4">
                   <label style="color: black">ارگان قرارداد کننده</label>
                   <input type="text" name="org" value="{{$project->org}}"  class="form-control" placeholder="ارگان قرارداد کننده"  required>
                 </div>
                 <div class="col-md-4">
                   <label  style="color: black">نوع پروژه (بخش)</label>
                   <input type="text" name="type" value="{{$project->type}}" class="form-control" placeholder="نوع پروژه (بخش)" required>
                 </div>
                 <div class="col-md-4">
                   <label for="profession" style="color: black">تعداد اساتید</label>
                   <input type="number" min="1" name="teacher" value="{{$project->teacher}}"  class="form-control" placeholder="تعداد اساتید" required>
                 </div>
               </div>

               <div class="row form-group">
                   <div class="col-md-4">
                     <label  style="color: black">تعداد کارمندان</label>
                     <input type="number" min="1" name="empolyee" value="{{$project->empolyee}}"  class="form-control" placeholder="تعداد کارمندان"  required>
                   </div>
                   <div class="col-md-4">
                     <label  style="color: black">تعداد سایت ها</label>
                     <input type="number" min="1" name="site" value="{{$project->site}}" class="form-control" placeholder="تعداد سایت ها" required>
                   </div>
                   <div class="col-md-4">
                     <label  style="color: black">اقساط</label>
                     <input type="number" min="1" name="payments" value="{{$project->payments}}"  class="form-control" placeholder="اقساط" required>
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
