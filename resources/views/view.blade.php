<html lang="en">
<head>
<title>View User</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="resources/css/app.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<style type="text/css">
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

header {
  background-color: #ff5500;
  padding: 30px;
  text-align: center;
  font-size: 35px;
  color: white;
}

nav {
  float: left;
  width: 30%;
  height: 450px; 
  background: #f6ff00;
  padding: 20px;
}

nav ul {
  list-style-type: none;
  padding: 0;
}

article {
  float: left;
  padding: 20px;
  width: 70%;
  background-color: #f1f1f1;
  height: 450px; 
}

section::after {
  content: "";
  display: table;
  clear: both;
}

footer {
  background-color: #f6ff00;
  padding: 10px;
  align-content: 0%;
  text-align: center;
}

@media (max-width: 600px) {
  nav, article {
    width: 100%;
    height: auto;
  }
}
</style>
</head>
<body>
  
   <input type="hidden" name="id" id="id" value="{{$user->id}}">

<header>
  <h2>{{$user->name}}</h2>
</header>

<section>
  <nav>
    <ul>
      <img src="{{ asset('user/' . $user->profile_picture)}}" width="400px;" height="400px;" class="img-responsive" alt="Cinque Terre">
    </ul>
  </nav>
  
  <article>
    <h3>Email : {{$user->email}}</h3>
    <h3>Date of Birth : {{$user->dob}}</h3>
    <h3>Gender : {{$user->gender}}</h3>
    <h3>Designation : {{$user->designation}}</h3>
    <h3>Country : {{$user->country}}</h3>
    <h3>Favourite Color : {{$user->fav_color}}</h3>
    <h3>Favourite Actor : {{$user->fav_actor}}</h3>
    
  </article>
</section>

<footer>
  <input type="submit" class="btn btn-success add" name="add_friend" value="Add Friend">
  <h4 class="frnds"><i class="fa fa-handshake-o frnds"></i> Friends</h4> 
</footer>
</body>
</html>

<script type="text/javascript">

  $(".frnds").hide();
  $(".add").click(function(event){
    event.preventDefault();

    let id = $("#id").val();

    $.ajax({
      url: '{{route("addFriend")}}' + '/' + id,
      type: "POST",
      data: {id:id},
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    
      success:function(response){
        console.log(response);
        if(response){
          $(".add").hide();
          $(".frnds").show();
        }
      }
    })
  })
</script>