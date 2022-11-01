@extends('layout')
@include('sidenav')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('css/update.css') }}">
<main class="register-form">
  <div class="cotainer" style="overflow-x:hidden">
  <div class="row justify-content-left ml-5">
          <div class="col-md-10">
            <br>
            <div class="column">
             <h3 style="color:black;">Update Profile</h3>
         
             @foreach($users as $user)
                 <form method="POST" action="{{ route('profile.update',['id'=>$user->id])  }}">
                    {{ csrf_field() }}
            <div class="column" style=" float: left;width: 20%;margin-left:20px; padding-top:20px;">
                    <div class="form-group">
                        <label for="name">Name :</label>
                        <input type="text" class="form-control" placeholder="Enter Full Name"
                         id="name" name="name"  value="{{$user->name}}"  required autofocus>
 
                    </div>

                    <div class="form-group" style="margin-top:20px;">
                        <label for="username">User Name :</label>
                        <input type="text" class="form-control" placeholder="Enter Full Name"
                         id="username" name="username"  value="{{$user->username}}"  required autofocus>
 
                    </div>

                    <div class="form-group"  style="margin-top:20px;">
                        <label for="email">Email :</label>
                        <input type="email" class="form-control" placeholder="Email" 
                        id="email" name="email"  value="{{$user->email}}" required autofocus>
 
                    </div>
                    
                    <div class="form-group" style="margin-top:20px;">
                        <label for="contactNumber">Phone Number :</label>
                        <input type="tel" class="form-control" placeholder="Contact Number" 
                        id="handphone_number" name="handphone_number" 
                        pattern="[0-9]{3}-[0-9]{7}|[0-9]{3}-[0-9]{8}"  value="{{$user->handphone_number}}" required autofocus>
                        <p style="margin:1px;font-size:9px;">*Format: 123-4567890</p>

                    </div> 

                    <div class="form-group" style="margin-top:20px;">
                        <label for="ic">IC Number :</label>
                        <input type="text" class="form-control" placeholder="IC eg. 991114-07-7777" id="ic" name="ic"
                        pattern="[0-9]{6}-[0-9]{2}-[0-9]{4}"  value="{{$user->ic}}" required autofocus>

                    </div> 
</div>
<div class="column" style=" float: left;width: 20%;margin-left:30px;">
                    <div class="form-group" style="margin-top:20px;">
                        <label for="bank_account_number1">Bank Account Number 1 :</label>
                        <input type="text" class="form-control" placeholder="Bank Account Number 1"
                         id="bank_account_number1" name="bank_account_number1"  value="{{$user->bank_account_number1}}"  required autofocus>
 
                    </div>
                    
                    <div class="form-group" style="margin-top:20px;">
                        <label for="bank_account_number2">Bank Account Number 2 :</label>
                        <input type="text" class="form-control" placeholder="Bank Account Number 2"
                         id="bank_account_number2" name="bank_account_number2"  value="{{$user->bank_account_number2}}">
 
                    </div>

                    <div class="form-group" style="margin-top:20px;">
                        <label for="bank_account_number3">Bank Account Number 3 :</label>
                        <input type="text" class="form-control" placeholder="Bank Account Number 3"
                         id="bank_account_number3" name="bank_account_number3"  value="{{$user->bank_account_number3}}">
 
                    </div>

                    

                    <div class="form-group"   style="margin-top:20px;">
                        <label for="gender">Gender :</label><br>
                        <input type="radio" id="male" name="gender"
                        style="vertical-align: middle; margin-bottom:2px;"  value="Male" required >
                        <label for="Male" style="font-size:14px;">Male</label>&nbsp;
                        <input type="radio" id="female" name="gender"
                        style="vertical-align: middle;margin-bottom:2px;margin-left:5px;"  value="Female"required>
                        <label for="female" style="font-size:14px;">Female</label>
                    </div>
       
                    <div class="form-group" style="text-align:right;"><br>
                        <button  type="submit" class="btn btn-primary">Submit</button>
                    </div>
    
   </div>
</div>      </form>
         
                @endforeach
        </div>
        </div>
        </div>
        </div>
        </main>
        <br><br>
        @endsection