@extends('layout')
@include('sidenav')
@section('content')
<style>
    table {
    font-size:14px;
}
    .trhead{
        background-color: #37758f;
        color:white;
    }

    tr:nth-child(even) {
  background-color: #f5f5f5;
}
    .row{
        margin-right:0 !important;
    }

    </style>
 <link rel="stylesheet" type="text/css" href="{{ url('css/search.css') }}">
<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-6">
        <br>
        <div class="card-body" style="padding-top:0 !important;padding-left:10px !important;">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}  
                </div>  
            @endif   
       <h3>Blacklists</h3>
       @if(auth()->user()->isAdmin() || auth()->user()->isAgent())
            <br><button style="width:70px;" class="btn btn-primary" onclick= "window.location.href = '/add-to-blacklist';">Create</button>                        
            @endif 
    <!-- Search -->
       <form action="{{route('blacklist.search')}}" method="POST">
    @csrf
       <div class="search">
           <div class="input">
            <input name="keyword" type="search" placeholder="Search" style="float:left !important">
            <button type="submit" style="float:left !important"><i class="fa fa-search"></i></button>                               
                            </div>
                    </div>
            </form>
         
           
        <table class="table table-bordered" style="margin-top:10px;">
            <thread>
                <tr class="trhead">
                    <td>Member Name</td>
                    <td>Email</td>
                    <td>Contact Number</td>
                    <td>IC Number</td>
                    <td>Reason</td>
                    <td>Remark</td>
                    <td>Bank Account</td>
                    <td>Gender</td>    
                    @if(auth()->user()->isAdmin() || auth()->user()->isAgent())
                    <td>Action</td>
                    @endif     
                    <td>Created by</td>
                    <td>Deleted by</td>
                </tr>
            </thread>
            <tbody>
                @foreach($blacklists as $viewBlacklist)
                <tr>
                    <td>{{ $viewBlacklist->name }}</td>
                    <td>{{ $viewBlacklist->email }}</td>
                    <td>{{ $viewBlacklist->handphone_number }}</td>
                    <td>{{ $viewBlacklist->ic }}</td>
                    <td>{{ $viewBlacklist->reason }}</td>
                    <td>{{ $viewBlacklist->remark }}</td>
                    <td>{{ $viewBlacklist->bank_account_number1 }}
                        {{ $viewBlacklist->bank_account_number2 }}
                        {{ $viewBlacklist->bank_account_number3 }}
                    </td>
                    <td>{{ $viewBlacklist->gender }}</td>
                    @if(auth()->user()->isAdmin() || auth()->user()->isAgent())
                    <td style='white-space: nowrap'>
                        @if(auth()->user()->isAdmin() || auth()->user()->id == $viewBlacklist->created_by)
                        <a href="{{ route('edit.blacklist',['id'=>$viewBlacklist->id]) }}" class="btn btn-warning btn-xs">Edit</a>
                        <a href="{{ route('blacklist.delete',['id'=>$viewBlacklist->id]) }}" class="btn btn-danger btn-xs"
                        onClick="return confirm('Are you sure to delete?')">Delete</a>
                        @else
                        N/A
                        @endif
                    </td>
                    @endif
                    <td>{{ $viewBlacklist->uName }}</td>
                    <td>{{ $viewBlacklist->deleted_by }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $blacklists -> links("pagination::bootstrap-4")}}
        <br><br>
    </div>
</div>
@endsection