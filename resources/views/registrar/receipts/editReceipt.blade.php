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
         <form action="{{url('receipt', [$receipt->id])}}" method="POST">
         <input type="hidden" name="_method" value="PUT">
         {{ csrf_field() }}
         <div class="row form-group">
             <div class="col-md-6">
               <label for="profession" style="color: black">نمبر</label>
               <input type="number" min="1" name="number" value="{{$receipt->number}}"   class="form-control" placeholder="نمبر"  required>
             </div>
             <div class="col-md-6">
               <label for="fullName" style="color: black">تاریخ</label>
               <input type="date" name="date" value="{{$receipt->date}}"   class="form-control" placeholder="تاریخ" required>
             </div>
           </div>
         <div class="row form-group">
             <div class="col-md-4">
               <label for="profession" style="color: black">اسم استاد</label>
               <input type="text" name="name" value="{{$receipt->name}}"   class="form-control" placeholder="اسم استاد"  required>
             </div>
             <div class="col-md-4">
               <label for="fullName" style="color: black">اسم پدر</label>
               <input type="text" name="fName" value="{{$receipt->fName}}"  class="form-control" placeholder="اسم پدر" required>
             </div>
             <div class="col-md-4">
               <label for="profession" style="color: black">اصول صنفی</label>
               <input type="number" min="1" name="doc1" value="{{$receipt->doc1}}"  class="form-control" placeholder="اصول صنفی" required>
             </div>
           </div>

           <div class="row form-group">
               <div class="col-md-4">
                 <label for="profession" style="color: black">لایحه وظایف</label>
                 <input type="number" min="1" name="doc2" value="{{$receipt->doc2}}"   class="form-control" placeholder="لایحه وظایف"  required>
               </div>
               <div class="col-md-4">
                 <label for="fullName" style="color: black">ترق تعلیم</label>
                 <input type="number" min="1" name="doc3" value="{{$receipt->doc3}}" class="form-control" placeholder="ترق تعلیم" required>
               </div>
               <div class="col-md-4">
                 <label for="profession" style="color: black">کتاب مشاهدات</label>
                 <input type="number" min="1" name="doc4" value="{{$receipt->doc4}}"  class="form-control" placeholder="کتاب مشاهدات" required>
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
          @include('layouts.errors')
         <button type="submit" class="btn btn-success">ویرایش رکورد</button>
        <button type="reset" class="btn btn-primary">لغو</button>
        </form>
        <!--Form End -->
      </div>
  </div>
</div>
@endsection
