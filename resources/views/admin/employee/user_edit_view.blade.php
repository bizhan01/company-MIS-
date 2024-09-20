<html>
   <head>
      <title>View Student Records</title>
   </head>

   <body>

      <table border = "1">
         <tr>
            <td>ID</td>
            <td>Name</td>
            <td>email</td>
            <td>password</td>
            <td>Edit</td>
         </tr>
         @foreach ($users as $user)
         <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->password }}</td>
            <td><a href = 'editUser/{{ $user->id }}'>Edit</a></td>
         </tr>
         @endforeach
      </table>
   </body>
</html>
