@extends('layouts.master')
@section('content')
<div class="col-lg-1"> </div>
<br>
<center><h3>ویرایش معلومات استفاده کنندگان</h3></center>
<br></br>
  <form action = "/editUser/<?php echo $users[0]->id; ?>" method = "post" enctype="multipart/form-data" >
     <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
     <table>
        <tr>
           <td>اسم کاربر</td>
           <td>ایمیل</td>
           <td>عکس</td>
           <td>تایید</td>
        </tr>
        <tr>
           <td>
              <input type = 'text' name = 'name' class="form-control"   value = '<?php echo$users[0]->name; ?>'/>
           </td>
           <td>
              <input type = 'emai' name = 'email' class="form-control" value = '<?php echo$users[0]->email; ?>'/>

           </td>

              <input type = 'hidden' name = 'password' class="form-control"  value = '<?php echo$users[0]->password; ?>'/>

           <td>
              <input type = 'file' name = 'image' class="form-control"  value = '<?php echo$users[0]->profileImage; ?>'/>
           </td>
           <td>
           <input type = 'submit' value = "ویرایش رکورد"  class="btn btn-success"/>
           </td>
        </tr>
     </table>
    <br></br>
  </form>
@endsection
