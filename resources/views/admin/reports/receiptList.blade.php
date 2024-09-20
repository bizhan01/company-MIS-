@extends('layouts.master')
@section('content')
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="col-lg-12 box box-block bg-white">
      <center><h3>لیست اسناد تحویلی ها به استادان</h3></cente>
        <div class="table-responsive">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th data-priority="1">اسم استاد</th>
              <th data-priority="1">پدر</th>
              <th data-priority="1">اصول صنفی</th>
              <th data-priority="1">لایحه وظایف</th>
              <th data-priority="1">ترق تعلیم</th>
              <th data-priority="1">کتاب مشاهدات</th>
              <th data-priority="1">کارت هویت</th>
              <th data-priority="1">مکتوب معرفی</th>
              <th data-priority="1">هدایت مقام</th>
              <th data-priority="1">استعلام معرفی</th>
              <th data-priority="1">نقل قرارداد</th>
              <th data-priority="1">سایر ملزومات اداری</th>
              <th data-priority="1">ویرایش</th>
              <th data-priority="1">حذف</th>
            </tr>
          </thead>
          <tbody>
            @foreach($receipts as $receipt)
            <tr>
              <td>{{$receipt->name}}</td>
              <td>{{$receipt->fName}}</td>
              <td>{{$receipt->doc1}}</td>
              <td>{{$receipt->doc2}}</td>
              <td>{{$receipt->doc3}}</td>
              <td>{{$receipt->doc4}}</td>
              <td>{{$receipt->doc5}}</td>
              <td>{{$receipt->doc6}}</td>
              <td>{{$receipt->doc7}}</td>
              <td>{{$receipt->doc8}}</td>
              <td>{{$receipt->doc9}}</td>
              <td>{{$receipt->doc10}}</td>
              <td>
                <a href="{{ URL::to('receipt/' . $receipt->id . '/edit') }}"> <li class="fa fa-edit btn btn-info btn-rounded"></li> </a>
              </td>
              <td>
                <form action="{{url('receipt', [$receipt->id])}}" method="POST">
                  <input type="hidden" name="_method" value="DELETE">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit"  onclick='return confirm("حذف شود؟")' class="btn btn-danger btn-rounded fa fa-trash"></button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
