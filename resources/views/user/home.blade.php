<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2 class="text-red-500">Role - {{Auth::user()->role}}</h2>
    <h1>This is user Home Page.</h1>
    <form action="{{route('logout')}}" method="POST">
        @csrf
       <input type="submit" value="logOut">
   </form>
</body>
</html>
