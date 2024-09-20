@extends('layouts.master')
@section('content')
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="box col-lg-12 box-block bg-white">
      <h5 class="mb-1">نمایش اطلاعات</h5>
      <!-- Archive Start -->
       <div class="dropdown pull-right">
           <a href="#" class=" arrow-none card-drop fa fa-ellipsis-v" data-toggle="dropdown" aria-expanded="false" style="font-size: 15px">
               انتخاب ماه و سال<i class="mdi mdi-dots-vertical"></i>
           </a>
           <div class="dropdown-menu dropdown-menu-right">
               <!-- item-->
               @foreach($archives as $stats)
               <li>
                 <a href="/expense/?month={{ $stats['month'] }}&year={{ $stats['year'] }}" class="dropdown-item form-control" style=" font-size: 17px; color: black">
                   {{$stats['month']. ' ' .$stats['year']}}
                 </a>
                </li>
               @endforeach
              <a href="/expense" class="dropdown-item form-control">همه</a>
           </div>
       </div><br>
       <!-- Archive End -->
      <table class=" table  table-striped table-bordered dataTable" id="table-2">
        <thead>
          <tr>
            <th>شماره</th>
            <th>جنس</th>
            <th>تاریخ</th>
            <th>کتگوری</th>
            <th>اسم پروژه</th>
            <th>نمبر بل</th>
            <th>قیمت</th>
            <th>تعداد</th>
            <th>قیمت کلی</th>
            <th>ویرایش</th>
            <th>حذف</th>
          </tr>
        </thead>
        <tbody>
          <?php $sum=0; ?>
          @foreach($expenses as $expenses)
          <tr>
            <td>{{$expenses->id}}</td>
            <td>{{$expenses->item}}</td>
            <td>{{$expenses->date}}</td>
            <td>{{$expenses->category}}</td>
            <td>{{$expenses->consumer}}</td>
            <td>{{$expenses->billNumber}}</td>
            <td>{{$expenses->price}}</td>
            <td>{{$expenses->quantity}}</td>
            <td>{{$expenses->total}}</td>
            <td>
              <a href="{{ URL::to('expense/' . $expenses->id . '/edit') }}"> <li class="fa fa-edit btn btn-info btn-rounded"></li> </a>
            </td>
            <td>
              <form action="{{url('expense', [$expenses->id])}}" method="POST" >
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <button type="submit"  onclick='return confirm("حذف شود؟")' class="fa fa-trash btn btn-rounded btn-danger"></button>
              </form>
            </td>
          </tr>
          <?php $sum += $expenses->total; ?>
          @endforeach
          <tfoot>
            <tr>
              <th colspan="8">جمله مصارف</th>
              <th colspan="3"><?php echo $sum; ?></th>
            </tr>
          </tfoot>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
