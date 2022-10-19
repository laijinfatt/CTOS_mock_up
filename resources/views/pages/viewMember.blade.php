@extends('layout')
@include('sidenav')
@section('content')

<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
.button {
  background-color: blue; /* blue*/
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 1px 1px;
  cursor: pointer;
  border-radius: 12px;
}
.button2 {
    background-color: blue;
    border: none;
    style: height:20px; width:35px;
    border-radius: 6px;
    color: white;
} /* Blue */
.button3 {
    background-color: blue;
    border: none;
    style: height:20px; width:35px;
    border-radius: 6px;
    color: white;
} /* Red */ 
.button4 {
    background-color: blue; 
    border: none;
    style: height:20px; width:100px;
    border-radius: 12px;
    color: white;
} /* Gray */ 
.button5 {
    background-color: #4cd038;
    border: none;
    border-radius: 8px;
} /* Black */
.button6 {
    background-color: red;
    border: none;
    border-radius: 8px;
} /* Black */
input.right {
        float: right;
      }
      i.right {
        float: right;
      }
      table, th, td {
  border:1px solid black;
}
table {
  border-collapse: collapse;
  width: 100%;
}
th, td {
  text-align: left;
  padding: 8px;
}
tr:nth-child(even) {
  background-color: #DCDCDC;
}
</style>

<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-6">
        <br><br>
        <h3>Member List</h3>
        <table class="table table-bordered">
            <thread>
                <tr>
                   <td style="background-color:#5F8575;"><h4 style="color:white;">  Name  </h4></td>
                     <td style="background-color:#5F8575;"><h4 style="color:white;"> Email </h4></td>
                     <td style="background-color:#5F8575;"><h4 style="color:white;"> IC </h4></td>
                      <td style="background-color:#5F8575;"><h4 style="color:white;"> Bank Account Number </h4></td>
                      <td style="background-color:#5F8575;"><h4 style="color:white;"> Bank Company </h4></td>  
                   <td style="background-color:#5F8575;"><h4 style="color:white;"> Handphone Number </h4></td>
                    <td style="background-color:#5F8575;"><h4 style="color:white;"> Status </h4></td>
                    <td style="background-color:#5F8575;"><h4 style="color:white;"> Gender </h4></td>
                    <td style="background-color:#5F8575;"><h4 style="color:white;"> Type </h4></td>
                </tr>
            </thread>
            <tbody>
                @foreach($users as $viewMember)
                <tr>
                     <td>{{ $viewMember->name }}</td>
                   <td>{{ $viewMember->email }}</td>
                     <td>{{ $viewMember->ic }}</td>
                   <td>{{ $viewMember->bank_account_number }}</td>
                    <td>{{ $viewMember->bank_company }}</td>
                       <td> {{ $viewMember->handphone_number }}</td> 
                        <td>{{ $viewMember->status}}</td>
                    <td> {{ $viewMember->gender }}</td>
                    <td> {{ $viewMember->type }} </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br><br>
    </div>
</div>
@endsection


<!-- <div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-6">
        <br><br>
        <h3>Member Lists</h3>
        <table class="table table-bordered ">
            <thread>
                <tr>
                    <td>Name</td>
                    <td>Email</td>
                    <td>IC</td>
                    <td>Bank Account Number</td>
                    <td>Bank Company</td>
                    <td>Handphone Number</td>
                    <td>Status</td>
                    <td>Gender</td>
                    <td>Type</td>
                </tr>
            </thread>
            <tbody>
                @foreach($users as $viewMember)
                <tr>
                    <td>{{ $viewMember->name }}</td>
                    <td>{{ $viewMember->email }}</td>
                    <td>{{ $viewMember->ic }}</td>
                    <td>{{ $viewMember->bank_account_number }}</td>
                    <td>{{ $viewMember->bank_company }}</td>
                    <td>{{ $viewMember->handphone_number }}</td>
                    <td>{{ $viewMember->status}}</td>
                    <td>{{ $viewMember->gender }}</td>
                    <td>{{ $viewMember->type }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br><br>
    </div>
</div> -->