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

   <div class="container">
    <div id="accountInformation">

       @if( $user->username == null )

        <h3> Edit Your Profile </h3>

        <form id="addInfo" method="post">
          {{ csrf_field() }}
        <table width="100%" class="table" >
          <tr>
            <td> Username </td>
            <td> <input type="username" name ="username" id="username"> </td>
          </tr>
          <tr>
            <td> First Name </td>
            <td> <input type="first_name" name ="first_name" id="first_name"> </td>
          </tr>
          <tr>
            <td> Last Name </td>
            <td> <input type="last_name" name ="last_name" id="last_name"> </td>
          </tr>
          <tr>
            <td> City </td>
            <td> <input type="city" name ="city" id="city"> </td>
          </tr>
          <tr>
            <td> Birthday </td>
            <td> <input type="birthday" name = "birthday" id="birthday"> </td>
          </tr>
          <tr>
            <td> Phone Number </td>
            <td> <input type="phone_number" name = "phone_number" id="phone_number"> </td>
          </tr>

        </table>

          <br>
          <input type="submit" value="Add" class="btn btn-primary">


        </form>


        @else
        <br>
          <div class="user_header">
            Hi {{$user->username}}
          </div>
          <br>
          <table style="width:80%">
            <tr>
              <td>First Name: </td>
              <td>{{$user->first_name}}</td>
            </tr>
            <tr>
              <td>Last Name: </td>
              <td>{{$user->last_name}}</td>
            </tr>
            <tr>
              <td>Email: </td>
              <td>{{$user->email}}</td>
            </tr>
            <tr>
              <td>City: </td>
              <td>{{$user->city}}</td>
            </tr>
            <tr>
              <td>Birthday: </td>
              <td>{{$user->birthday}}</td>
            </tr>
            <tr>
              <td>Phone Number: </td>
              <td>{{$user->phone_number}}</td>
            </tr>
          </table>
          @endif
      </div>

     <br>
     <a href="/logout"> Logout </a>

  </div>

  <div class='container-2'>

      @if (count($user->customer) == 0)
        You dont have any customers registered in the system! <br>
        Get started tracking customers information today by adding customers here <br>
      @else
      <table style="width:100%" class="table" id="customerTable">
        <thead>
          <th colspan="4"> Customer List </th>
        </thead>
        <tbody>
        @foreach($user->customer as $customer)
        <tr>
          <td> {{$customer->customer_name}} </td>
          <td> <a href="/account/customer/{{$customer->id}}"> View </td>
        </tr>
        @endforeach
        </tbody>
      </table>
      @endif
  </div>
  <div class="container-3">
    <form id="addCustomer" method="post" action="/account/customer">
      {{ csrf_field() }}

      <table width="100%" class="table" >
        <thead>
          <th colspan="2"> Add A Customer </th>
        </thead>
        <tr>
          <td> Customer Name </td>
          <td> <input type="customer_name" name ="customer_name" id="customer_name"> </td>
        </tr>
      <tr>
        <td> Street </td>
        <td> <input type="street" name ="street" id="street"> </td>
      </tr>
      <tr>
        <td> City  </td>
         <td> <input type="city" name ="city" id="city"> </td>
      </tr>
      <tr>
        <td> State </td>
        <td><input type="state" name ="state" id="state"></td>
      </div>
      <tr>
        <td> Email </td>
        <td><input type="email" name ="email" id="email"></td>
      </tr>
      <tr>
        <td> Contact First Name </td>
        <td><input type="poc_first_name" name ="poc_first_name" id="poc_first_name"></td>
      </tr>
      <tr>
        <td> Contact Last Name </td>
        <td><input type="poc_last_name" name ="poc_last_name" id="poc_last_name"></td>
      </tr>
      <tr>
        <td> Contact Phone </td>
        <td><input type="poc_number" name ="poc_number" id="poc_number"></td>
      </tr>
    </table>
    <input type="submit" value="Add" class="btn btn-primary">

    </form>

  </div>

  <div class="footer">
    Your Trackem account can be used to manage all your clients information in one convenient place.
    See a simple view of your client's information on your homepage and get a more detailed view
    by clicking into the client table. From their, you can keep track of communication you've had with
    each client by adding updates to their profiles. Enjoy!
  </div>

  </body>

  <style>

    .user_header {
      font-size: 20px;
    }

    .header_site {
      background-color: #9AB6FF;
      height: 75px;
    }

    .page-header, .page-header h1 {
        margin-top: 0;
        padding-left: 10px;
        padding-top: 10px;
        text-align: center;
    }

    #trackEmLogo {
      position: relative;
      left: 100px;
      bottom: 60px;
    }

    #accountInformation {
      width: 100%;
      position: relative;
      padding-left: 5px;
      padding-bottom: 25px;
      border-left: 2px solid black;
      min-height: 300px;
      text: 16px;
    }

    .container {
      width: 35%;
      float: left;
      margin-left: 20px;
    }

    .container-2 {
      width: 25%;
      float: left;
    }

    .container-3 {
      width: 35%;
      float:right;
    }

    .footer {
     position:absolute;
     bottom:0;
     width:100%;
     height:80px;
     border-top: 1px solid black;
     background-color: #E2E7F5;
     padding: 15px;
     font-size: 14px;
     font-family: "arial";
    }

    #customerTable {
      max-height: 400px;
      float: left;
    }

    #addCustomer {
      border-left: 2px solid black;
      width: 95%;
      height: 300px;
      padding: 10px;
    }

  </style>
</html>
