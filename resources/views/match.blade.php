@extends('menu')

<html>
<head>
	<title>Match %</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="resources/css/app.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
  body{
  width: 100%;
  position: relative;
  height: 70px;
  top: 100;
  z-index: 9999;
}
</style>
<body>
	<h1>People that Match You</h1>

	<table class="table table-hover table-responsive">
    <tr bgcolor="#ff003c">
      <th></th>
      <th></th>
      <th>Name</th>
      <th>Email ID</th>
      <th>Date of Birth</th>
      <th>Gender</th>
      <th>Favourite Color</th>
      <th>Favourite Actor</th>
    </tr>

@foreach ($users as $user)
    <tr>
      <td>{{++$i}}</td>
      <td> <img src="{{ asset('user/' . $user->profile_picture)}}" width="60px;" height="60px;" class="img-circle" alt="Cinque Terre"></td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->dob }}</td>
          <td>{{ $user->gender }}</td>
          <td>{{ $user->fav_color }}</td>
          <td>{{ $user->fav_actor }}</td>
    </tr>
    @endforeach
  </table>
</body>
</html>