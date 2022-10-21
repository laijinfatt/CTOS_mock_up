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
</style>

<main class="register-form">
  <div class="cotainer"><br>
      <div class="row justify-content-left ml-5">
          <div class="col-md-6" >
              <div class="card" style="height:450px;width:450px;">
                  <div class="card-header">Edit Blacklisted Person</div>
                  <div class="card-body">
                  @foreach($blacklists as $blacklist)
                  <form action="{{ route('blacklist.update',['id'=>$blacklist->id]) }}" method="POST">
                          @csrf
                          <div class="form-group row" style="margin-top:15px;">
                              <label for="name" class="col-md-4 col-form-label text-md-left"style="margin-right: -35px !important;">Name</label>
                              <div class="col-md-7">
                                  <input type="text" id="name" class="form-control" name="name" value="{{$blacklist->name}}" required autofocus>
                                  @if ($errors->has('name'))
                                      <span class="text-danger">{{ $errors->first('name') }}</span>
                                  @endif
                              </div>
                          </div>
                          <div class="form-group row" style="margin-top:15px;">
                              <label for="reason" class="col-md-4 col-form-label text-md-left"style="margin-right: -35px !important;">Reason</label>
                              <div class="col-md-7">
                                  <textarea type="text" id="reason" class="form-control" name="reason"
                                  style="height:100px; font-size:14px;"  value="{{$blacklist->reason}}" required autofocus></textarea >
                                  @if ($errors->has('reason'))
                                      <span class="text-danger">{{ $errors->first('reason') }}</span>
                                  @endif
                              </div>
                          </div>
  
                          <div class="form-group row">
                              <label for="remark" class="col-md-4 col-form-label text-md-left" style="margin-right: -35px !important;">Remark</label>
                              <div class="col-md-7">
                                  <textarea type="text" id="remark" class="form-control" name="remark" value="{{$blacklist->remark}}"></textarea >
                              </div>
                          </div>
  
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary" style="float:right;width:70px;">
                                  Update
                              </button>
                          </div>
                      </form>
                      @endforeach

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