@extends('layouts.master')
@section('content')
@include('finance.aside')
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="box box-block bg-white">
      <!-- ّform start -->
        <h1>ویرایش رکورد</h1>
        <hr>
         <form action="{{url('salary', [$salary->id])}}" method="POST">
         <input type="hidden" name="_method" value="PUT">
         {{ csrf_field() }}
         <div class="row form-group">
             <div class="col-md-4 ">
               <label for="profession" style="color: black">تاریخ</label>
               <input type="date"  name="date" value="{{$salary->date}}"  class="form-control"  required>
             </div>
             <div class="col-md-4">
               <label for="fullName" style="color: black">اسم</label>
               <input type="text" name="name" value="{{$salary->name}}" class="form-control" placeholder="منبع" required>
             </div>
             <div class="col-md-4">
               <label for="profession" style="color: black">اسم پدر</label>
               <input type="text" name="fName" value="{{$salary->fName}}"  class="form-control" placeholder="مبلغ" required>
             </div>
          </div>
          <div class="row form-group">
              <div class="col-md-4 ">
                <label for="profession" style="color: black">معاش ماهوار</label>
                <input type="number" name="salary" min="1" value="{{$salary->salary}}"  class="form-control"  required>
              </div>
              <div class="col-md-4">
                <label for="fullName" style="color: black">پرداخت</label>
                <input type="number" name="paid" min="1" value="{{$salary->paid}}" class="form-control" placeholder="منبع" required>
              </div>
              <div class="col-md-4">
                <label for="profession" style="color: black">باقی مانده</label>
                <input type="number" name="rest" min="1" value="{{$salary->rest}}"  class="form-control" placeholder="مبلغ" required>
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
