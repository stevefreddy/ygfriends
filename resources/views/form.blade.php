<!DOCTYPE html>
<html>
<head>
  <title>Sign Up</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta content='width=device-width, initial-scale=1, maximum-scale=1' name='viewport'/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
</head>

<style type="text/css">
    body{
      /*height: 60vh;*/
      display: flex;
      justify-content: space-around;
      align-items: center;
      flex-direction: column;
      font-family: sans-serif;
    }

    .form{
      width: 100%;
      position: relative;
      height: 100px
    }
</style>
<body>


  <form method="post" action="{{route('saveUser')}}" enctype="multipart/form-data">
 @csrf
    <div class="form">
      <label for="name">
        <span class="label-name">Name</span>
      </label>
      <input type="text" name="name" class="form-control input-lg" required>


      <label for="email">
        <span class="label-name">Email</span>
      </label>
      <input type="email" name="email" class="form-control input-lg" required>


      <label for="password">
        <span class="label-name">Password</span>
      </label>
      <input type="password" name="password" class="form-control input-lg" required>


      <label for="dob">
        <span class="label-name">Date of Birth</span>
      </label>
      <input type="date" name="dob" class="form-control input-lg" required>


      <label for="designation">
        <span class="label-name">Designation</span>
      </label>
      <input type="text" name="designation" class="form-control input-lg" required>


      <label for="gender">
        <span class="label-name">Gender</span>
      </label><br>
      <input type="radio" id="male" name="gender" value="male">
<label for="male">Male</label><br>
<input type="radio" id="female" name="gender" value="female">
<label for="female">Female</label><br>
<input type="radio" id="other" name="gender" value="other">
<label for="other">Other</label>
<br>

      <label for="profile_picture">
        <span class="label-name">Profile Picture</span>
      </label>
      <input type="file" name="profile_picture" class="form-control input-lg" required>


      <label for="country">
        <span class="label-name">Country</span>
      </label>
      <input type="text" name="country" class="form-control input-lg" required>


      <label for="fav_color">
        <span class="label-name">Favourite Color</span>
      </label>
      <input type="text" name="fav_color" class="form-control input-lg" required>


      <label for="fav_actor">
        <span class="label-name">Favourite Actor</span>
      </label>
      <input type="text" name="fav_actor" class="form-control input-lg" required> <br> <br>


      <div class="form-group text-center">
        <a href="{{ route('login') }}" class="btn btn-danger">Back</a>
        <input type="submit" name="submit" class="btn btn-primary" value="Register" />
      </div>
      <br> <br>
      
    </div>
  </form>
</body>
</html>


