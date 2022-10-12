@extends('layout')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('css/update.css') }}">
<main class="register-form">
  <div class="cotainer" style="overflow-x:hidden">
  <div class="row justify-content-right ml-5">
          <div class="col-md-10">
            <br>
            <div class="column" style=" float: left; width: 20%;">
             <h5>Update Agent</h5>
                 <form method="POST" action="{{ route('agent.edit') }}">
                    {{ csrf_field() }}
              
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" placeholder="Enter Full Name" id="name" name="name"  required autofocus>
                        @if ($errors->has('name'))
                                      <span class="text-danger">{{ $errors->first('name') }}</span>
                                  @endif
                    </div>

                    <div class="form-group"  style="margin-top:20px;">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control"placeholder="Email" id="email" name="email" required autofocus>
                        @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                    </div>
                    
                    <div class="form-group"   style="margin-top:20px;">
                        <label for="gender">Gender:</label><br>
                        <input type="radio" id="male" name="gender"
                        style="vertical-align: middle; margin-bottom:2px;">
                        <label for="Male" style="font-size:14px;">Male</label>&nbsp
                        <input type="radio" id="female" name="gender"
                        style="vertical-align: middle;margin-bottom:2px;margin-left:5px;">
                        <label for="femela" style="font-size:14px;">Female</label>
                    </div>

                    <div class="form-group"   style="margin-top:20px;">
                        <label for="ic">IC Number:</label>
                        <input type="text" class="form-control" placeholder="IC eg. 991114-07-7777" id="ic" name="ic"
                        pattern="[0-9]{6}-[0-9]{2}-[0-9]{4}"  required autofocus>
                        @if ($errors->has('ic'))
                                      <span class="text-danger">{{ $errors->first('ic') }}</span>
                                  @endif
                    </div> 
                    <div class="form-group"style="margin-top:20px;">
                        <input type="hidden" class="form-control" id="bank_account_number" name="bank_account_number"  required autofocus>
                        @if ($errors->has('bank_account_number'))
                                      <span class="text-danger">{{ $errors->first('bank_account_number') }}</span>
                                  @endif
                    </div>
                    </div>
        <!--Column 2-->
                <div class="column" style=" float: left;width: 20%;margin-left:50px; padding-top:21px;"  required autofocus>
                <div class="form-group">
                        <input type="hidden" class="form-control" id="bank_company" name="bank_company"  required autofocus>
                        @if ($errors->has('bank_company'))
                                      <span class="text-danger">{{ $errors->first('bank_company') }}</span>
                                  @endif
                    </div>

                <div class="form-group">
                        <input type="hidden" class="form-control" id="status" name="status" required autofocus>
                       <!-- <p style="margin:1px;font-size:9px;">*No Score, Poor, Low, Fair, Good, Very Good, &nbspExcellent</p>-->
                        @if ($errors->has('status'))
                                      <span class="text-danger">{{ $errors->first('status') }}</span>
                                  @endif
                    </div>
                    
                    <div class="form-group">
                        <label for="contactNumber">Contact Number:</label>
                        <input type="tel" class="form-control" placeholder="Contact Number" id="handphone_number" name="handphone_number" 
                        pattern="[0-9]{3}-[0-9]{7}" required autofocus>
                        <p style="margin:1px;font-size:9px;">*Format: 123-4567890</p>
                        @if ($errors->has('handphone_number'))
                                      <span class="text-danger">{{ $errors->first('handphone_number') }}</span>
                       @endif
                    </div> 

                    <div class="form-group">
                        <label for="type" style="margin-bottom:5px;">Type:</label><br>
                        <input type="number" id="type" class="form-control" name="type"  value="2" min="2" max="2">
                        <p style="margin:1px;font-size:9px;">*2 = Agent</p>
                    </div>

                    <div class="form-group" style="margin-top:20px;">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" placeholder="Password" id="password" name="password"  required autofocus>
                        @if ($errors->has('password'))
                                      <span class="text-danger">{{ $errors->first('password') }}</span>
                                  @endif
                    </div>

                    <div class="form-group" style="text-align:right;"><br>
                        <button  type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>
</div>
</div>
</div>
  </div>
</main>
@endsection