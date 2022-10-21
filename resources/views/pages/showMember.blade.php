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
<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-6">
        <br>
    <div class="card">
    <h3>Members Information</h3>
        <table class="table table-bordered">
            <thread>
                <tr class="trhead">
                    <td>Name</td>
                    <td>Email</td>
                    <td>IC</td>
                    <td>Bank Account Number</td>
                    <td>Bank Company</td>
                    <td>Handphone Number</td>
                    <td>Status</td>
                    <td>Gender</td>
                    <td>Type</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </thread>
            <tbody>
                @foreach($users as $viewMember)
                <tr>
                    <td>{{ $viewMember->name }}</td>
                    <td>{{ $viewMember->email }}</td>
                    <td>{{ $viewMember->ic }}</td>
                    <td>{{ $viewMember->bank_account_number }}</td>
                    <td>{{ $viewMember->bank_company }}</td>
                    <td>{{ $viewMember->handphone_number }}</td>
                    <td>{{ $viewMember->status}}</td>
                    <td>{{ $viewMember->gender }}</td>
                    <td>{{ $viewMember->type }}</td>
                    <td><a href="{{ route('member.edit',['id'=>$viewMember->id]) }}" class="btn btn-warning btn-xs">Edit</a> </td>
                    <!--<td><a href=" {{ route('add.to.blacklist',['id'=>$viewMember->id]) }}" class="btn btn-dark btn-xs">Add to Blacklist</a></td>-->
                   <td><a href="{{ route('member.delete',['id'=>$viewMember->id]) }}" class="btn btn-danger btn-xs"  
                   onClick="return confirm('Are you sure to delete?')">Delete</a></td> 
                </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        </div>
    </div>
</div>
@endsection