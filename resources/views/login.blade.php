<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Main Page </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
  <body>

    <div class="container-fluid">
        <div class="row">
            <div class="page-header header_site">
                <h1> Trackem </h1> <img src="{{URL::asset('/image/trackEmLogo.png')}}" height="50" width="50" id="trackEmLogo">
            </div>
        </div>
    </div>

    <form method="post" id="loginForm" >
      {{ csrf_field() }}
      <h2> Login </h2> <br> <br>

      <div class="form-group">
        <label for="email"> Email </label>
        <input type="email" class="form-control" name ="email" id="email" placeholder = "Login by adding an email here">
      </div>
      <div class="form-group">
        <label for="password"> Password </label>
        <input type="password" class="form-control" name ="password" id="password" placeholder = "Login by adding a password here">
      <br>
      <input type="submit" value="Login" class="btn btn-primary">

      <br> <br> <br>
    <p> Not a member? <a href="/"> Sign up here </a> </p>

    @if (session('successStatus'))
    <div class="alert alert-success" role="alert">
        {{ session('successStatus') }}
    </div>
    @endif
    @if (session('incorrectLogin'))
    <div class="alert alert-danger" role="alert">
        {{ session('incorrectLogin') }}
    </div>
    @endif

    </form>
    </div>
  </body>


  <style>

    .header_site {
      background-color: #9AB6FF;
      height: 75px;
    }

    .page-header, .page-header h1 {
        margin-top:0;
        padding-left: 10px;
        padding-top: 10px;
        text-align: center;
    }

    #trackEmLogo {
      position: relative;
      left: 100px;
      bottom: 60px;
    }

    #loginForm{
      width: 60%;
      position: relative;
      left: 20%;
      padding: 25px;
      padding-top: 5px;
      background-color: white;
      border-radius: 25px;
    }

    body {
      background-image: url('/image/office_space2.jpg');
      background-size: 100%;
    }


  </style>

</html>
