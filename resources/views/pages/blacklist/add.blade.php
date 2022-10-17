@extends('layout')
@include('sidenav')
@section('content')
<main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Add member to blacklist</div>
                  <div class="card-body">
  
                      <form action="{{ route('blacklist.post') }}" method="POST">
                          @csrf
                          <div class="form-group row">
                              <label for="user_name" class="col-md-4 col-form-label text-md-right">Member Name</label>
                              <div class="col-md-6">
                                  <input type="text" id="user_name" class="form-control" name="user_name" required autofocus>
                                  @if ($errors->has('user_name'))
                                      <span class="text-danger">{{ $errors->first('user_name') }}</span>
                                  @endif
                              </div>
                          </div>
  
                          <div class="form-group row">
                              <label for="reason" class="col-md-4 col-form-label text-md-right">Reason</label>
                              <div class="col-md-6">
                                  <input type="text" id="reason" class="form-control" name="reason" required autofocus>
                                  @if ($errors->has('reason'))
                                      <span class="text-danger">{{ $errors->first('reason') }}</span>
                                  @endif
                              </div>
                          </div>
  
                          <div class="form-group row">
                              <label for="remark" class="col-md-4 col-form-label text-md-right">Remark</label>
                              <div class="col-md-6">
                                  <input type="text" id="remark" class="form-control" name="remark">
                              </div>
                          </div>
  
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  Add
                              </button>
                          </div>
                      </form>
                        
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>
@endsection