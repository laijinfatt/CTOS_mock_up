@extends('layout')
@include('sidenav')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('css/update.css') }}">
<main class="register-form">
  <div class="cotainer" style="overflow-x:hidden">
  <div class="row justify-content-right ml-5">
          <div class="col-md-10">
            <br>
            <div class="column" style=" float: left; width: 20%;">
             <h5>Update Members</h5> 
               @foreach($users as $user)
                 <form method="POST" action="{{ route('user.update',['id'=>$user->id])  }}">
                    {{ csrf_field() }}
                 
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control"  value="{{$user->name}}" id="name" name="name"  required autofocus>
                        <input type="hidden" name="id" id="id"
                value="{{$user->id}}">
                    </div>

                    <div class="form-group" style="margin-top:20px;">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" value="{{$user->email}}" id="email" name="email" required autofocus>
                    </div>
                    
                    <div class="form-group"  style="margin-top:20px;">
                        <label for="gender">Gender:</label><br>
                        <input type="radio" id="male" name="gender"
                        style="vertical-align: middle; margin-bottom:2px;" value="Male" required>
                        <label for="Male" style="font-size:14px;">Male</label>&nbsp
                        <input type="radio" id="female" name="gender"
                        style="vertical-align: middle;margin-bottom:2px;margin-left:5px;" value="Female" required>
                        <label for="female" style="font-size:14px;">Female</label>
                    </div>

                    <div class="form-group">
                        <label for="ic">IC Number:</label>
                        <input type="text" class="form-control" placeholder="IC eg. 991114-07-7777" id="ic" name="ic"
                        pattern="[0-9]{6}-[0-9]{2}-[0-9]{4}"  value="{{$user->ic}}" required autofocus>
                    </div> 

                    <div class="form-group"style="margin-top:20px;">
                        <label for="bankAccount">Bank Account Number:</label>
                        <input type="text" class="form-control" placeholder="Enter Bank Account number" id="bank_account_number" name="bank_account_number" 
                        value="{{$user->bank_account_number}}" required autofocus>
                    </div>
                    </div>
        <!--Column 2-->
                <div class="column" style=" float: left;width: 20%;margin-left:50px; padding-top:32px;"  required autofocus>
                <div class="form-group">
                        <label for="bankCompany">Bank Company:</label>
                        <input type="text" class="form-control" placeholder="Enter Bank Company" 
                        id="bank_company" name="bank_company" value="{{$user->bank_company}}"  required autofocus>
                    </div>

                <div class="form-group">
                        <!-- <label for="status">Status:</label> -->
                        <input type="hidden" class="form-control" id="status" name="status" 
                        value="{{$user->status}}" required autofocus>
                        <!-- <p style="margin:1px;font-size:9px;">*No Score, Poor, Low, Fair, Good, Very Good, &nbspExcellent</p> -->
                    </div>
                    <!-- <div class="form-group">
                        <label for="score">Score:</label> -->
                        <input type="hidden" class="form-control" id="score" name="score" 
                        value="{{$user->score}}" required autofocus>
                        <!-- <p style="margin:1px;font-size:9px;">*300-850</p>
                    </div> -->
                    
                    <div class="form-group" style="margin-top:20px;">
                        <label for="contactNumber">Contact Number:</label>
                        <input type="tel" class="form-control" placeholder="Contact Number" id="handphone_number" name="handphone_number" 
                        pattern="[0-9]{3}-[0-9]{7}|[0-9]{3}-[0-9]{8}" value="{{$user->handphone_number}}" required autofocus>
                        <p style="margin:1px;font-size:9px;">*Format: 123-4567890/123-45678901</p>
                    </div> 

                    <div class="form-group">
                        <label for="type" style="margin-bottom:5px;">Type:</label><br>
                        <input type="number" id="type" class="form-control" name="type"  value="1" min="1" max="1">
                        <p style="margin:1px;font-size:9px;">*1 = Member</p>
                    </div>
</div>
                    <!--Column 3-->
                    <div class="column" style=" float: left;width: 20%;margin-left:50px; padding-top:32px;"  required autofocus>
                    <div class="form-group" >
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" placeholder="Password" 
                        id="password" name="password" value="{{$user->password}}" required autofocus>
                    </div>

                    <div class="form-group" style="text-align:right;"><br>
                        <button  type="submit" class="btn btn-primary">Submit</button>
                    </div>
</div>

                </form>
         @endforeach       
</div>
</div>
</div>
  </div>
</main>
@endsection