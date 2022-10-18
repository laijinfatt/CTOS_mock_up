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
                  <div class="card-header">Add Member to Blacklist</div>
                  <div class="card-body">
                  @foreach($users as $user)
                      <form action="{{ route('blacklist.post', ['id'=>$user->id]) }}" method="POST">
                          @csrf
                          
                        
                          <div class="form-group row">
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
                                  <input type="text" id="remark" class="form-control" name="remark">
                              </div>
                          </div>
  
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary" style="float:right;width:70px;">
                                  Add to blacklist
                              </button>
                          </div>
                      </form>
                      @endforeach
                        
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>
@endsection