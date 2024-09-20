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
         <form action="{{url('document', [$document->id])}}" method="POST">
         <input type="hidden" name="_method" value="PUT">
         {{ csrf_field() }}
         <div class="row form-group">
             <div class="col-md-4">
               <label for="profession" style="color: black">نمبر</label>
               <input type="number" name="number" value="{{$document->number}}"  class="form-control" placeholder="نمبر"  required>
             </div>
             <div class="col-md-4">
               <label for="fullName" style="color: black">تاریخ</label>
               <input type="date" name="date" value="{{$document->date}}"  class="form-control" placeholder="تاریخ" required>
             </div>
             <div class="col-md-4">
               <label for="profession" style="color: black">موضوع</label>
               <input type="text" name="subject" value="{{$document->subject}}"   class="form-control" placeholder="موضوع" required>
             </div>
           </div>

           <div class="row form-group">
               <div class="col-md-4">
                 <label for="profession" style="color: black">از</label>
                 <input type="text" name="from"  value="{{$document->from}}"  class="form-control" placeholder="از"  required>
               </div>
               <div class="col-md-4">
                 <label for="fullName" style="color: black">به</label>
                 <input type="text" name="to" value="{{$document->to}}" class="form-control" placeholder="به" required>
               </div>
               <div class="col-md-4">
                 <input type="hidden" name="type" value="{{$document->type}}">
                 <input type="hidden" name="image" value="{{$document->image}}">
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
