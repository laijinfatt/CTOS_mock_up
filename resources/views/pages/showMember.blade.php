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
    .card{
    width:fit-content;
    padding:20px;  
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
    <div class="card">
    <h3>Members Information</h3><br>
    <button style="width:70px;" class="btn btn-primary" onclick= "window.location.href = '/user-registration';">Create</button>
    <form action="{{route('member.search')}}" method="POST">
    @csrf
   <div class="search">
                <div class="input">
           
                   <button type="submit"><i class="fa fa-search"></i></button> 
                   <input name="keyword" type="search" placeholder="Search" >
                    
                </div>
        </div>
</form>
   <table class="table table-bordered">
            <thread>
                <tr class="trhead">
                <td style='white-space: nowrap'>Name
                         <a href="{{route('member.show.name')}}" style="text-decoration:none; color:white;">&#8593</a> 
                         <a href="{{route('member.show.name.desc')}}" style="text-decoration:none; color:white;">&#8595</a> 
                    </td>
                    <td>Email</td>
                    <td>IC</td>
                    <td>Bank Account Number</td>
                    <td>Handphone Number</td>
                    <td>Gender</td>
                    <td>Action</td>
                    
                </tr>
            </thread>
            <tbody>
                @foreach($users as $viewMember)
                <tr>
                    <td>{{ $viewMember->name }}</td>
                    <td>{{ $viewMember->email }}</td>
                    <td>{{ $viewMember->ic }}</td>
                    <td>{{ $viewMember->bank_account_number1 }}
                        {{ $viewMember->bank_account_number2 }}
                        {{ $viewMember->bank_account_number3 }}
                    </td>
                    <td>{{ $viewMember->handphone_number }}</td>
                    <td>{{ $viewMember->gender }}</td>
                    <td  style='white-space: nowrap'><a href="{{ route('member.edit',['id'=>$viewMember->id]) }}" class="btn btn-warning btn-xs">Edit</a>
                   <a href="{{ route('member.delete',['id'=>$viewMember->id]) }}" class="btn btn-danger btn-xs"  onClick="return confirm('Are you sure to delete?')">Delete</a></td> 
                </tr>
                @endforeach
            </tbody> 
        </table>
        <div>
        {{ $users -> links("pagination::bootstrap-4")}}</div>
        <br>
        </div>
    </div>
</div>
@endsection