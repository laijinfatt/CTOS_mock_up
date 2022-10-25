@extends('layout')
@include('sidenav')
@section('content')
<style>
.card-header{
    font-size:16px;
    font-weight:bold;
    }   
label{
    font-weight:bold;
}
.row{
        margin-right:0 !important;
    }
</style>

<main class="register-form">
  <div class="cotainer"><br>
      <div class="row justify-content-left ml-5">
          <div class="col-md-6" >
              <div class="card" style="height:550px;width:850px;">
                  <div class="card-header">Add Member to Blacklist</div>
                  <div class="card-body">

                  <form action="{{ route('blacklist.post') }}" method="POST">
                          @csrf
                          <div class="column" style=" float: left;width: 50%;">
                          <div class="form-group row" style="margin-top:15px;">
                              <label for="name" class="col-md-4 col-form-label text-md-left"style="margin-right: -35px !important;">Name</label>
                              <div class="col-md-7">
                                  <input type="text" id="name" class="form-control" name="name" required autofocus>
                                  @if ($errors->has('name'))
                                      <span class="text-danger">{{ $errors->first('name') }}</span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="email" class="col-md-4 col-form-label text-md-left" style="margin-right: -35px !important;">Email</label>
                              <div class="col-md-7">
                                  <input type="text" id="email" class="form-control" name="email">
                              </div>
                          </div> 

                          <div class="form-group row">
                              <label for="handphone_number" class="col-md-4 col-form-label text-md-left" style="margin-right: -35px !important;">Contact Number</label>
                              <div class="col-md-7">
                                  <input type="text" id="handphone_number" class="form-control" name="handphone_number"  pattern="[0-9]{3}-[0-9]{7}|[0-9]{3}-[0-9]{8}">
                              </div>
                          </div> 

                 <div class="form-group row" >
                        <label for="ic" class="col-md-4 col-form-label text-md-left" style="margin-right: -35px !important;">IC Number</label>
                        <div class="col-md-7">
                        <input type="text" class="form-control" placeholder="eg. 991114-07-7777" id="ic" name="ic"
                        pattern="[0-9]{6}-[0-9]{2}-[0-9]{4}" required autofocus>
                </div>
                    </div> 

                    <div class="form-group row" >
                        <label for="bank_account_number1" class="col-md-4 col-form-label text-md-left" style="margin-right: -35px !important;">Bank Account Number 1</label>
                        <div class="col-md-7">
                        <input type="text" class="form-control" id="bank_account_number1" name="bank_account_number1"
                        style="margin-top:10px;" required autofocus>
                </div>
                    </div> 
                    <div class="form-group row" >
                        <label for="bank_account_number2" class="col-md-4 col-form-label text-md-left" style="margin-right: -35px !important;">Bank Account Number 2</label>
                        <div class="col-md-7">
                        <input type="text" class="form-control" id="bank_account_number2" name="bank_account_number2"
                        style="margin-top:10px;"  >
                </div>
                    </div> 
                    <div class="form-group row" >
                        <label for="bank_account_number3" class="col-md-4 col-form-label text-md-left" style="margin-right: -35px !important;">Bank Account Number 3</label>
                        <div class="col-md-7">
                        <input type="text" class="form-control" id="bank_account_number3" name="bank_account_number3"
                        style="margin-top:10px;"  >
                </div>
                    </div> 
</div>
<div class="column" style=" float: left;width: 50%;">
                    <div class="form-group row"  style="margin-top:20px;">
                        <label for="gender" class="col-md-4 col-form-label text-md-left" style="margin-right: -35px !important;">Gender</label>
                        <div class="col-md-7">
                        <input type="radio" id="male" name="gender"
                        style="margin-top:10px;margin-bottom:5px;" value="Male" required>
                        <label for="Male" style="font-size:14px;">Male</label>&nbsp
                        <input type="radio" id="female" name="gender"
                        style="margin-left:5px;margin-bottom:5px;" value="Female" required>
                        <label for="female" style="font-size:14px;">Female</label>
</div>
                    </div>

                          <div class="form-group row" style="margin-top:15px;">
                              <label for="reason" class="col-md-4 col-form-label text-md-left"style="margin-right: -35px !important;">Reason</label>
                              <div class="col-md-7">
                                  <textarea type="text" id="reason" class="form-control" name="reason"
                                  style="height:100px; font-size:14px;"  required autofocus></textarea >
                                  @if ($errors->has('reason'))
                                      <span class="text-danger">{{ $errors->first('reason') }}</span>
                                  @endif
                              </div>
                          </div>
  
                          <div class="form-group row">
                              <label for="remark" class="col-md-4 col-form-label text-md-left" style="margin-right: -35px !important;">Remark</label>
                              <div class="col-md-7">
                                  <textarea type="text" id="remark" class="form-control" name="remark"></textarea >
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="social_media_account" class="col-md-4 col-form-label text-md-left" style="margin-right: -35px !important;">Social Media Account</label>
                              <div class="col-md-7">
                                  <textarea type="text" id="social_media_account" class="form-control" name="social_media_account"></textarea >
                              </div>
                          </div>

                          <div class="form-group row">
                              <!-- <label for="created_by" class="col-md-4 col-form-label text-md-left" style="margin-right: -35px !important;">Created_by</label> -->
                              <div class="col-md-7">
                                  <input type="hidden" id="created_by" class="form-control" name="created_by" value="{{Auth::user()->id}}">
                              </div>
                          </div>

                          <div class="form-group row">
                              <!-- <label for="deleted_by" class="col-md-4 col-form-label text-md-left" style="margin-right: -35px !important;">Created_by</label> -->
                              <div class="col-md-7">
                                  <input type="hidden" id="deleted_by" class="form-control" name="deleted_by" value="1">
                              </div>
                          </div>
  
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary" style="float:right;width:70px;">
                                  Add
                              </button>
                          </div>
</div>
                      </form>
                  

                      <div class="error-messeges" style="background-color:red;color:white;margin-top:15px;
                        font-size:14px;padding-left:5px;padding-right:5px; width:max-content;margin-top:50px;">
                      {!! session()->get('error') !!}
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>
@endsection