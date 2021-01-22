@extends('menu')

<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="resources/css/app.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

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
<div>
  <center>

  <table class="table table-hover table-responsive t">
     <form method="get" action="{{route('search')}}">
        <input type="text" name="search" placeholder="search">
        <button class="btn btn-default-sm" type="submit"><i class="fa fa-search"></i></button> ____
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#filter">Filter</button>

    </form>
    <tr bgcolor="#aaff00">
      <th></th>
      <th></th>
      <th>Name</th>
      <th>Email ID</th>
      <th>Date of Birth</th>
      <th>Action</th>
    </tr>

@foreach ($users as $user)
    <tr>
      <td>{{++$i}}</td>
      <td> <img src="{{ asset('user/' . $user->profile_picture)}}" width="60px;" height="60px;" class="img-circle" alt="Cinque Terre"></td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->dob }}</td>
          <td><a href="view/{{$user->id}}"><img src="{{ asset('public/view.svg')}}"alt="image"></a></td>
    </tr>
    @endforeach
  </table>
  </center>
</div>

</body>
</html> 



<!-- Modal -->
<div class="modal fade" id="filter" tabindex="-1" role="dialog" aria-labelledby="filterModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="filterModal">Filter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('filter')}}" method="get">
          Gender:
          <select name="gender" id="gender" styles="width: 200px" class="input-lg dynamic">
              <option></option>
              <option  value="male"> Male </option>
              <option value="female"> Female </option>
              <option value="others"> Others </option>
          </select> <br>

          Favourite Color:
          <input type="text" name="color" class="form-control">

          Favourite Actor:
          <input type="text" name="actor" class="form-control">


        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Filter</button>
      </div>
    </form>
    </div>
  </div>
</div>
