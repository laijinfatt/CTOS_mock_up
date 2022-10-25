
@extends('layout')
@include('sidenav')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('css/userRegister.css') }}">
<main class="register-form">
  <div class="cotainer" style="overflow-x:hidden">
  <div class="row justify-content-right ml-5">
          <div class="col-md-10">
            <br>
            <div class="column" style=" float: left; width: 20%;">
             <h5>Create Members</h5>
                 <form method="POST" action="{{ route('register.post') }}">
                 <?php
                    //$rand=rand();
                    //$_SESSION['rand']=$rand;
                 ?>
                 {{--<input type="hidden" value="<?php echo $rand; ?>" name="randcheck" />--}}
                    {{ csrf_field() }}
              
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" placeholder="Enter Full Name" id="name" name="name"  required autofocus>
                        @if ($errors->has('name'))
                                      <span class="text-danger">{{ $errors->first('name') }}</span>
                                  @endif
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control"placeholder="Email" id="email" name="email" required autofocus>
                        @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                    </div>

                    <div class="form-group">
                        <label for="contactNumber">Contact Number:</label>
                        <input type="tel" class="form-control" placeholder="Contact Number" id="handphone_number" name="handphone_number" 
                        pattern="[0-9]{3}-[0-9]{7}|[0-9]{3}-[0-9]{8}" required autofocus>
                        <p style="margin:1px;font-size:9px;">*Format: 123-4567890/123-45678901</p>
                        @if ($errors->has('handphone_number'))
                                      <span class="text-danger">{{ $errors->first('handphone_number') }}</span>
                       @endif
                    </div>  
  
                    </div>
        <!--Column 2-->
                <div class="column" style=" float: left;width: 20%;margin-left:100px; padding-top:32px;"  required autofocus>


                    <div class="form-group" style="margin-bottom:10px!important">
                        <label for="gender">Gender:</label><br>
                        <input type="radio" id="gender" name="gender" name="gender" value="Male"
                        style="vertical-align: middle; margin-bottom:2px;">
                        <label for="Male" style="font-size:14px;">Male</label>&nbsp
                        <input type="radio" id="gender" name="gender"name="gender" value="Female"
                        style="vertical-align: middle;margin-bottom:2px;margin-left:5px;">
                        <label for="female" style="font-size:14px;">Female</label>
                    </div>

                    <div class="form-group">
                        <label for="type" style="margin-bottom:5px;">Type:</label><br>
                        <input type="number" id="type" class="form-control" name="type"  value="1" min="1" max="1">
                        <p style="margin:1px;font-size:9px;">*1 = Member</p>
                    </div>

                    <div class="form-group" >
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" placeholder="Password" id="password" name="password"  required autofocus>
                        @if ($errors->has('password'))
                                      <span class="text-danger">{{ $errors->first('password') }}</span>
                                  @endif
                    </div>

                    <div class="form-group" style="text-align:center;"><br>
                        <button  type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>
</div>
</div>
</div>
  </div>
</main>


@endsection