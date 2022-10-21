@extends('layout')
@include('sidenav')
@section('content')
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}  
                </div>  
            @endif
        <table class="table table-bordered">
            <thread>
                <tr>
                    <td>Member Name</td>
                    <td>Reason</td>
                    <td>Remark</td>
                    @if(auth()->user()->isAdmin() || auth()->user()->isAgent())
                    <td>Action</td>
                    @endif
                </tr>
            </thread>
            <tbody>
                @foreach($users as $viewBlacklist)
                <tr>
                    <td>{{ $viewBlacklist->name }}</td>
                    <td>{{ $viewBlacklist->reason }}</td>
                    <td>{{ $viewBlacklist->remark }}</td>
                    @if(auth()->user()->isAdmin() || auth()->user()->isAgent())
                    <td>
                        <a href="{{ route('edit.blacklist',['id'=>$viewBlacklist->id]) }}" class="btn btn-warning btn-xs">Edit</a>
                        <a href="{{ route('blacklist.delete',['id'=>$viewBlacklist->id]) }}" class="btn btn-danger btn-xs">Delete</a>
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
        <br><br>
    </div>
</div>
@endsection