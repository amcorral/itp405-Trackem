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
   <div id="top">
     <div class="container">
       <div id="customerInformation">
         <div class="customer_header">
           {{$customer->customer_name}}
         </div>
         <br>
         <table style="width:100%">
           <tr>
             <td>Contact First Name: </td>
             <td>{{$customer->poc_first_name}}</td>
           </tr>
           <tr>
             <td>Contact Last Name: </td>
             <td>{{$customer->poc_last_name}}</td>
           </tr>
           <tr>
             <td> Email: </td>
             <td>{{$customer->email}}</td>
           </tr>
           <tr>
             <td> Phone Number: </td>
             <td>{{$customer->poc_number}}</td>
           </tr>
           <tr>
             <td> Street: </td>
             <td>{{$customer->street}}</td>
           </tr>
           <tr>
             <td> City: </td>
             <td>{{$customer->city}}</td>
           </tr>
           <tr>
             <td> State: </td>
             <td>{{$customer->state}}</td>
           </tr>
         </table>

       </div>
     </div>
     <div class="container-2">

       <form id="addCustomerUpdate" method="post">
         {{ csrf_field() }}

         <table width="100%" class="table" >
           <thead>
             <th colspan="2"> Write an Update </th>
           </thead>
           <tr>
             <td> Update Date </td>
             <td> <input type="update_date" name ="update_date" id="update_date"> </td>
           </tr>
         <tr>
           <td> Update </td>
           <td> <textarea name="update" cols="50" rows="5"></textarea> </td>
         </tr>
       </table>
       <input type="submit" value="Add" class="btn btn-primary">

       </form>
    </div>
   </div>

   <div id ="bottom">

     @if (count($customer->customer_update) == 0)
     <div id="conditionalBottom">
       It looks like you haven't added any updates for this customer.  <br>
       Add customer updates using the form above! <br>
     </div>
     @else
     <table style="width:100%" class="table" id="customerUpdateTable">
       <thead>
         <th colspan="4"> Customer Updates </th>
       </thead>
       <tbody>
       @foreach($customer->customer_update as $customerUpdate)
       <tr>
         <td> {{$customerUpdate->update_date}} </td>
         <td> {{$customerUpdate->update}}</td>
       </tr>
       @endforeach
       </tbody>
     </table>
     @endif

   </div>


  </body>

  <style>

    .customer_header {
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

    #customerInformation {
      width: 100%;
      position: relative;
      padding-right: 50px;
      padding-left: 50px;
      padding-bottom: 25px;
      border-left: 2px solid black;
      min-height: 200px;
      text: 16px;
    }

    .container {
      width: 40%;
      float: left;
      margin-left: 20px;
    }

    .container-2 {
      width: 50%;
      float: left;
    }

    #bottom {
      height: 300px;
    }

    #top {
      height: 300px;
      border-bottom: 1px solid black;
    }

    #addCustomerUpdate {
      border-left: 2px solid black;
      width: 95%;
      height: 200px;
      padding: 10px;
    }

    #conditionalBottom{
      padding-top: 30px;
      text-align:center;
      font-size: 16px;
    }

  </style>
</html>
