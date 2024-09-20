@extends('layouts.master')
@section('content')
@include('finance.aside')
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
      <center> <h1>ثبت مالیات</h1> </center>
       <form method="POST" action="/tax" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="row form-group">
              <div class="col-md-4">
                <label for="profession" style="color: black">منبع پرداخت</label>
                <input type="text" name="source" value=""  class="form-control"  required>
              </div>
              <div class="col-md-4">
                <label for="fullName" style="color: black">نوع مالیه</label>
                <input type="text" name="type" value="" class="form-control" required>
              </div>
              <div class="col-md-4">
                <label for="profession" style="color: black">مبلغ </label>
                <input type="number" min="1" name="amount" value=""  class="form-control" placeholder="مبلغ" required>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12" >
                <label for="">توضیحات</label>
                <textarea name="detail" class="form-control" id="exampleTextarea" rows="3" ></textarea>
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

<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="col-lg-12 box box-block bg-white">
      <center><h3>لیست مالیات</h3></center>
      <!-- Archive Start -->
       <div class="dropdown pull-right">
           <a href="#" class=" arrow-none card-drop fa fa-ellipsis-v" data-toggle="dropdown" aria-expanded="false" style="font-size: 15px">
               انتخاب ماه و سال<i class="mdi mdi-dots-vertical"></i>
           </a>
           <div class="dropdown-menu dropdown-menu-right">
               <!-- item-->
               @foreach($archives as $stats)
               <li>
                 <a href="/revenue/?month={{ $stats['month'] }}&year={{ $stats['year'] }}" class="dropdown-item form-control" style=" font-size: 17px; color: black">
                   {{$stats['month']. ' ' .$stats['year']}}
                 </a>
                </li>
               @endforeach
              <a href="/revenue" class="dropdown-item form-control">همه</a>
           </div>
       </div><br>
       <!-- Archive End -->
      <table class="table table-striped table-bordered dataTable" id="table-2">
        <thead>
          <tr>
            <th>منبع پرداخت</th>
            <th>نوع مالیه</th>
            <th>مبلغ</th>
            <th>توضیحات</th>
            <th>ویرایش</th>
            <th>حذف</th>
          </tr>
        </thead>
        <tbody>
          <?php $sum=0; ?>
          @foreach($taxes as $tax)
          <tr>
            <td>{{$tax->source}}</td>
            <td>{{$tax->type}}</td>
            <td>{{$tax->amount}}</td>
            <td>{{$tax->detail}}</td>
            <td>
              <a href="{{ URL::to('tax/' . $tax->id . '/edit') }}"> <li class="fa fa-edit btn btn-info btn-rounded"></li> </a>
            </td>
            <td>
              <form action="{{url('tax', [$tax->id])}}" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <button type="submit"  onclick='return confirm("حذف شود؟")' class="btn btn-danger btn-rounded fa fa-trash"></button>
              </form>
            </td>
          </tr>
          <?php $sum += $tax->amount; ?>
          @endforeach
          <tfoot>
            <tr>
              <th colspan="2">جمله عواید</th>
              <th colspan="3"><?php echo $sum; ?></th>
            </tr>
          </tfoot>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
