@extends('layouts.master')
@section('content')
@include('finance.aside')
<script src="{{url('js/jquery.min.js')}}"> </script>
<script src="{{url('js/math.js')}}"> </script>
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="box box-block bg-white">
      <!-- ّform start -->
        <div class="" style="padding: 50px">
        <h1>ویرایش رکورد</h1>
        <hr>
         <form action="{{url('expense', [$expense->id])}}" method="POST">
         <input type="hidden" name="_method" value="PUT">
         {{ csrf_field() }}
         <div class="row form-group">
             <div class="col-md-3 ">
               <label for="fullName" style="color: black">اسم جنس</label>
               <input type="text" name="item" value="{{$expense->item}}" class="form-control" placeholder="اسم جنس" required>
             </div>

             <div class="col-md-3 ">
               <label for="profession" style="color: black">تاریخ</label>
               <input type="date" name="date" value="{{$expense->date}}"  class="form-control"  required>
             </div>

             <div class="col-md-3">
               <label for="fullName"  style="color: black">کتگوری</label>
               <select class="form-control" name="category" value="{{$expense->category}}">
                 <option value=" مواد غذایی ">مواد غذایی</optio>
                 <option value=" متفرقه ">متفرقه</optio>
                 <option value=" اجناس">خرید اجناس</optio>
                 <option value=" ترمیمات">ترمیمات</optio>
                 <option value="تبلغات ">تبلغات</optio>
                 <option value="مصارف اداری ">مصارف اداری</optio>
                 <option value="معاش ">معاش</optio>
                 <option value="آب ">آب</optio>
                 <option value=" برق">برق</optio>
                 <option value="مالیه ">مالیه</optio>
                 <option value="سایر ">سایر</optio>
               </select>
             </div>
             <div class="col-md-3">
               <label for="profession" style="color: black">اسم پروژه</label>
               <input type="text" name="consumer" value="{{$expense->consumer}}"  class="form-control" placeholder="مصرف کننده" required>
             </div>
           </div>

         <div class="row form-group">
             <div class="col-md-3 ">
               <label for="fullName" style="color: black">نمبر بل</label>
               <input type="number" name="billNumber" value="{{$expense->billNumber}}" class="form-control" placeholder="نمبر بل"   required>
             </div>
             <div class="col-md-3">
               <label for="profession" style="color: black">قیمت (فی دانه)</label>
               <input type="number" name="price" value="{{$expense->price}}"  id="fn"  class="form-control" placeholder="قیمت (فی دانه) "  required>
             </div>
             <div class="col-md-3">
               <label for="fullName" style="color: black">تعداد</label>
               <input type="number" name="quantity" value="{{$expense->quantity}}" id="sn" class="form-control"  placeholder="تعداد"  required>
             </div>
             <div class="col-md-3">
               <label for="profession" style="color: black">قیمت کلی </label>
               <input type="number" name="total"  value="{{$expense->total}}"  readonly id="mul"  class="form-control" placeholder="قیمت کلی " required>
             </div>
           </div>
          @include('layouts.errors')
         <button type="submit" class="btn btn-success">ویرایش رکورد</button>
         <button type="reset" class="btn btn-primary">لغو</button>
        </form>
      </div>
    </div>
  </div>
@endsection
