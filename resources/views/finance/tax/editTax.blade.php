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
         <form action="{{url('tax', [$tax->id])}}" method="POST">
         <input type="hidden" name="_method" value="PUT">
         {{ csrf_field() }}
         <div class="row form-group">
             <div class="col-md-4 ">
               <label for="profession" style="color: black">تاریخ</label>
               <input type="text" name="source" value="{{$tax->source}}"  class="form-control"  required>
             </div>
             <div class="col-md-4">
               <label for="fullName" style="color: black">منبع</label>
               <input type="text" name="type" value="{{$tax->type}}" class="form-control" placeholder="منبع" required>
             </div>
             <div class="col-md-4">
               <label for="profession" style="color: black">مبلغ </label>
               <input type="number" min="1" name="amount" value="{{$tax->amount}}"  class="form-control" placeholder="مبلغ" required>
             </div>
           </div>

           <div class="col-lg-13">
             <label for="">توضیحات</label>
             <textarea name="detail" class="form-control" id="exampleTextarea" rows="3" >{{$tax->detail}}</textarea>
           </div> <br>


          @include('layouts.errors')
         <button type="submit" class="btn btn-success">ویرایش رکورد</button>
        <button type="reset" class="btn btn-primary">لغو</button>
        </form>
        <!--Form End -->
      </div>
  </div>
</div>
@endsection
