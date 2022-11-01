@extends('layout')
@include('sidenav')
@section('content')

<main class="register-form">
  <div class="container" style="overflow-x:hidden;margin-top:30px;">
  <div class="row justify-content-left ml-5">
          <div class="col-md-10">

          @if(Session::has('error'))
            <div class="alert" style="background-color:#F83030;">
                <span class="check"><i class="fa fa-exclamation-circle" style="font-size:20px;color:white; justify-content: center;"></i></span>
                <span class="msg"  style="color:white;">{{Session::get('error')}}</span>
                <span class="crose" data-dismiss="alert" style="font-size:20px;">&times;</span>
            </div>
        @endif
          
            <div class="validation-message" style="width: 30%;"><?php if(isset($message)) { echo $message; } ?> </div>
             <h3 style="color:black; width:fit-content;">Update Password</h3>
             <br>
             @foreach($users as $user)
                 <form  name="frmChange" method="POST" action="{{ route('password.update')  }}"  onSubmit="return validatePassword()">
                    @csrf
                    <input type="hidden" id="userID" name="userID" value="{{Auth()->user()->id}}">
              
                    <div class="form-group"> 
                     
                        <label class="inline-block">Please enter the new password :</label>
                        <br>
                        <span id="password"  
                    class="validation-message" style="color:red;"></span> &nbsp;   
                    <input type="password" id="password" name="password" class="full-width"  required autofocus>

                    </div>

                    <div class="form-group"  style="margin-top:20px;">
                   
                        <label class="inline-block">Confirm your new password :</label>
                        <br>
                        <span id="confirmPassword"
                        class="validation-message" style="color:red;"></span>&nbsp;
                        <input type="password" name="confirmPassword" id="confirmPassword"
                        class="full-width"  required autofocus>
                    </div>
                    
                   <br>
                   &nbsp;&nbsp; <button type="submit" class="btn btn-primary" onClick="return confirm('Are you sure to change your password?')">Submit</button>
                    
     </div>
                </form>
                @endforeach
        </div>
        </div>
        </div>
        </div>
        </main>
        <br><br>
        @endsection