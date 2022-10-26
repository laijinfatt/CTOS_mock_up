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
<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-6">
        <br><br>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}  
                </div>  
            @endif   
       <h3>Blacklists</h3><br>
            @if(auth()->user()->isAdmin() || auth()->user()->isAgent())
            <button style="width:70px;" class="btn btn-primary" onclick= "window.location.href = '/add-to-blacklist';">Create</button>                        
            @endif 
           
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
                        <a href="{{ route('edit.blacklist',['id'=>$viewBlacklist->id]) }}" class="btn btn-warning btn-xs">Edit</a>
                        <a href="{{ route('blacklist.delete',['id'=>$viewBlacklist->id]) }}" class="btn btn-danger btn-xs"
                        onClick="return confirm('Are you sure to delete?')">Delete</a>
                    </td>
                    @endif
                    <td>{{ $viewBlacklist->uName }}</td>
                    <td>{{ $viewBlacklist->deleted_by }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br><br>
    </div>
</div>
@endsection