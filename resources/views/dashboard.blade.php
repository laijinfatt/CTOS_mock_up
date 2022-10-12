@extends('layout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if(auth()->user()->isAdmin())
                <div class="card-header">{{ __('Admin Dashboard') }}</div>
  
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
  
                    You are Logged In
                    
                    <a class="nav-link" href="{{ route('agent.register') }}">Register an agent here!</a>
                    <a class="nav-link" href="{{ route('user.register') }}">Register new member here!</a>
                    <a class="nav-link" href="{{ route('agent.view') }}">View the list of agents here!</a>
                    <a class="nav-link" href="{{ route('member.view') }}">View the list of member here!</a>
                
                </div>
                @elseif(auth()->user()->isAgent())
                <div class="card-header">{{ __('Agent Dashboard') }}</div>
  
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
  
                    You are Logged In as an agent. 
                    
                    <a class="nav-link" href="{{ route('user.register') }}">Register new member here!</a>
                    <a class="nav-link" href="{{ route('member.view') }}">View the list of member here!</a>
                
                </div>
                @elseif(auth()->user()->isMember())
                <div class="card-header">{{ __('Member Dashboard') }}</div>
  
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
  
                    You are Logged In as a member. 
                
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection