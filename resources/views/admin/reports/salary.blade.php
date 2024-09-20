@extends('layouts.master')
@section('content')
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="col-lg-12 box box-block bg-white">
      <center><h3>لیست معاشات</h3></center>
      <!-- Archive Start -->
       <div class="dropdown pull-right">
           <a href="#" class=" arrow-none card-drop fa fa-ellipsis-v" data-toggle="dropdown" aria-expanded="false" style="font-size: 15px">
               انتخاب ماه و سال<i class="mdi mdi-dots-vertical"></i>
           </a>
           <div class="dropdown-menu dropdown-menu-right">
               <!-- item-->
               @foreach($archives as $stats)
               <li>
                 <a href="/salary/?month={{ $stats['month'] }}&year={{ $stats['year'] }}" class="dropdown-item form-control" style=" font-size: 17px; color: black">
                   {{$stats['month']. ' ' .$stats['year']}}
                 </a>
                </li>
               @endforeach
              <a href="/salary" class="dropdown-item form-control">همه</a>
           </div>
       </div><br>
       <!-- Archive End -->
      <table class="table table-striped table-bordered dataTable" id="table-2">
        <thead>
          <tr>
            <th>تاریخ</th>
            <th>اسم</th>
            <th>اسم پدر</th>
            <th>معاش ماهوار</th>
            <th>پرداخت</th>
            <th>باقی مانده</th>
            <th>ویرایش</th>
            <th>حذف</th>
          </tr>
        </thead>
        <tbody>
          <?php $sum1=0;  $sum2=0; $sum3=0; ?>
          @foreach($salaries as $salary)
          <tr>
            <td>{{$salary->date}}</td>
            <td>{{$salary->name}}</td>
            <td>{{$salary->fName}}</td>
            <td>{{$salary->salary}}</td>
            <td>{{$salary->paid}}</td>
            <td>{{$salary->rest}}</td>
            <td>
              <a href="{{ URL::to('salary/' . $salary->id . '/edit') }}"> <li class="fa fa-edit btn btn-info btn-rounded"></li> </a>
            </td>
            <td>
              <form action="{{url('salary', [$salary->id])}}" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <button type="submit"  onclick='return confirm("حذف شود؟")' class="btn btn-danger btn-rounded fa fa-trash"></button>
              </form>
            </td>
          </tr>
          <?php $sum1 += $salary->salary; ?>
          <?php $sum2 += $salary->paid; ?>
          <?php $sum3 += $salary->rest; ?>
          @endforeach
          <tfoot>
            <tr>
              <th colspan="3">جمله عواید</th>
              <th ><?php echo $sum1; ?></th>
              <th ><?php echo $sum2; ?></th>
              <th colspan="3"><?php echo $sum3; ?></th>
            </tr>
          </tfoot>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
