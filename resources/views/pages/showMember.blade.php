@extends('layout')
@include('sidenav')
@section('content')
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <table class="table table-bordered">
            <thread>
                <tr>
                    <td>Name</td>
                    <td>Email</td>
                    <td>IC</td>
                    <td>Bank Account Number</td>
                    <td>Bank Company</td>
                    <td>Handphone Number</td>
                    <td>Status</td>
                    <td>Gender</td>
                    <td>Type</td>
                    <td>Action<td>
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
                </tr>
                @endforeach
            </tbody>
        </table>
        <br><br>
    </div>
</div>
@endsection