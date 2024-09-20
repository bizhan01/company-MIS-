@extends('layouts.master')
@section('content')
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="col-lg-12 box box-block bg-white">
      <center><h3>لیست پروژه ها</h3></cente>
      <table class="table table-striped table-bordered dataTable" id="table-2">
        <thead>
          <tr>
            <th>پروژه</th>
            <th>کد</th>
            <th>تاریخ قرارداد</th>
            <th>شروع </th>
            <th>ختم</th>
            <th>قیمت پروژه</th>
            <th>ارگان قرارداد کننده</th>
            <th>بخش</th>
            <th>تعداد اساتید</th>
            <th>تعداد کارمندان</th>
            <th>تعداد سایت ها</th>
            <th>اقساط</th>
            <th>ویرایش</th>
            <th>حذف</th>
          </tr>
        </thead>
        <tbody>
          <?php $sum=0; ?>
          @foreach($projects as $project)
          <tr>
            <td>{{$project->name}}</td>
            <td>{{$project->code}}</td>
            <td>{{$project->date}}</td>
            <td>{{$project->start}}</td>
            <td>{{$project->end}}</td>
            <td>{{$project->price}}</td>
            <td>{{$project->org}}</td>
            <td>{{$project->type}}</td>
            <td>{{$project->teacher}}</td>
            <td>{{$project->empolyee}}</td>
            <td>{{$project->site}}</td>
            <td>{{$project->payments}}</td>
            <td>
              <a href="{{ URL::to('project/' . $project->id . '/edit') }}"> <li class="fa fa-edit btn btn-info btn-rounded"></li> </a>
            </td>
            <td>
              <form action="{{url('project', [$project->id])}}" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <button type="submit"  onclick='return confirm("حذف شود؟")' class="btn btn-danger btn-rounded fa fa-trash"></button>
              </form>
            </td>
          </tr>
          <?php $sum += $project->price; ?>
          @endforeach
          <tfoot>
            <tr>
              <th colspan="5">جمله عواید</th>
              <th colspan="9"><?php echo $sum; ?></th>
            </tr>
          </tfoot>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
