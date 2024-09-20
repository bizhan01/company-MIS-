@extends('layouts.master')
@section('content')

<script src="js/jquery.min.js"> </script>
<script src="js/math.js"> </script>

<center> <h1>صورت حساب (بیلانس)</h1> </center>

  <!-- Content -->
  <div class="content-area py-1">
    <div class="container-fluid">
      <div class="col-lg-12 col-md-12 col-sm-12 box box-block bg-white">
        <h5 class="mb-1">لیست عواید</h5>
        <table class="table table-striped table-bordered dataTable" id="table-2">
          <thead>
            <tr>
              <th>تاریخ</th>
              <th>منبع</th>
              <th>مبلغ</th>
            </tr>
          </thead>
          <tbody>
            <?php $rev =0; ?>
            @foreach($revenues as $revenue)
            <tr>
              <td>{{$revenue->date}}</td>
              <td>{{$revenue->source}}</td>
              <td>{{$revenue->amount}}</td>
            </tr>
            <?php $rev += $revenue->amount; ?>
            @endforeach
            <tfoot>
              <tr>
                <th colspan="2">جمله عواید</th>
                 <th colspan="1" id="fn"><?php echo $rev; ?></th>
              </tr>
            </tfoot>
          </tbody>
        </table>
        <center style="direction: ltr; ">
          <h3 style="color: #0af30a"> جمله عواید  <?php
            echo $rev;
         ?></h3> </center>
      </div>
    </div>
  </div><!-- Content -->




  <!-- Content -->
  <div class="content-area py-1">
    <div class="container-fluid">
      <div class="box col-lg-12 col-md-12 col-sm-12 box-block bg-white">
        <h5 class="mb-1">لیست مصارف روزانه</h5>
        <table class=" table  table-striped table-bordered dataTable" id="table-2">
          <thead>
            <tr>
              <th>تاریخ</th>
              <th>جنس</th>
              <th>قیمت کلی</th>
            </tr>
          </thead>
          <tbody>
            <?php $exp=0; ?>
            @foreach($expenses as $expenses)
            <tr>
              <td>{{$expenses->date}}</td>
              <td>{{$expenses->item}}</td>
              <td>{{$expenses->total}}</td>
            </tr>
            <?php $exp += $expenses->total; ?>
            @endforeach
            <tfoot>
              <tr>
                <th colspan="2">جمله لیست مصارف روزانه</th>
                <th colspan="1" ><?php echo $exp; ?></th>
              </tr>
            </tfoot>
          </tbody>
        </table>
      </div>
    </div>
  </div>


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
                 @foreach($archives3 as $stats)
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
              <!-- <th>ویرایش</th>
              <th>حذف</th> -->
            </tr>
          </thead>
          <tbody>
            <?php $sum1=0;  $sal=0; $sum3=0; ?>
            @foreach($salaries as $salary)
            <tr>
              <td>{{$salary->date}}</td>
              <td>{{$salary->name}}</td>
              <td>{{$salary->fName}}</td>
              <td>{{$salary->salary}}</td>
              <td>{{$salary->paid}}</td>
              <td>{{$salary->rest}}</td>
              <!-- <td>
                <a href="{{ URL::to('salary/' . $salary->id . '/edit') }}"> <li class="fa fa-edit btn btn-info btn-rounded"></li> </a>
              </td>
              <td>
                <form action="{{url('salary', [$salary->id])}}" method="POST">
                  <input type="hidden" name="_method" value="DELETE">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit"  onclick='return confirm("حذف شود؟")' class="btn btn-danger btn-rounded fa fa-trash"></button>
                </form>
              </td> -->
            </tr>
            <?php $sum1 += $salary->salary; ?>
            <?php $sal += $salary->paid; ?>
            <?php $sum3 += $salary->rest; ?>
            @endforeach
            <tfoot>
              <tr>
                <th colspan="3">جمله عواید</th>
                <th ><?php echo $sum1; ?></th>
                <th ><?php echo $sal; ?></th>
                <th colspan="3"><?php echo $sum3; ?></th>
              </tr>
            </tfoot>
          </tbody>
        </table>
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
                 @foreach($archives4 as $stats)
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
              <!-- <th>ویرایش</th>
              <th>حذف</th> -->
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
              <!-- <td>
                <a href="{{ URL::to('tax/' . $tax->id . '/edit') }}"> <li class="fa fa-edit btn btn-info btn-rounded"></li> </a>
              </td>
              <td>
                <form action="{{url('tax', [$tax->id])}}" method="POST">
                  <input type="hidden" name="_method" value="DELETE">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit"  onclick='return confirm("حذف شود؟")' class="btn btn-danger btn-rounded fa fa-trash"></button>
                </form>
              </td> -->
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
        <center style="direction: ltr; ">
          <h3 style="color: #f32403"> جمله مصارف <?php
            $total = $sum;
            echo $total;
         ?></h3> </center>
      </div>
    </div>
  </div>



<div class="container">
  <div class="row row-md">
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
      <div class="box box-block tile tile-2 bg-success mb-2">
        <div class="t-icon right"><i class="ti-bar-chart"></i></div>
        <div class="t-content">
          <h1 class="mb-1" dir="ltr" style="text-align: right"><?php echo $rev; ?></h1><br>
          <h6 class="text-uppercase">عواید</h6>
        </div>
      </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
      <div class="box box-block tile tile-2 bg-danger mb-2">
        <div class="t-icon right"><i class="fa fa-money"></i></div>
        <div class="t-content">
          <h1 class="mb-1" dir="ltr" style="text-align: right">
            <?php
              $output = $exp + $sal + $sum;
              echo $output;
           ?>
          </h1><br>
          <h6 class="text-uppercase">مصارف</h6>
        </div>
      </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
      <div class="box box-block tile tile-2 bg-primary mb-2">
        <div class="t-icon right"><i class="fa fa-balance-scale"></i></div>
        <div class="t-content">
          <h1 class="mb-1" dir="ltr" style="text-align: right">
            <?php
            $c = $rev - $output;
            echo $c;
           ?>
          </h1><br>
          <h6 class="text-uppercase">بیلانس</h6>
        </div>
      </div>
    </div>
  </div>
</div>




@endsection
