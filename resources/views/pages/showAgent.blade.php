@extends('layout')
@include('sidenav')
@section('content')
<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-6">
        <br><br>
        <h3>Agents Information</h3>
        <table class="table table-bordered">
            <thread>
                <tr>
                    <td>Name</td>
                    <td>Email</td>
                    <td>IC</td>
                    <td>Handphone Number</td>
                    <td>Gender</td>
                    <td>Type</td>
                    <td></td>
                    
                </tr>
            </thread>
            <tbody>
                @foreach($users as $viewAgent)
                <tr>
                    <td>{{ $viewAgent->name }}</td>
                    <td>{{ $viewAgent->email }}</td>
                    <td>{{ $viewAgent->ic }}</td>
                    <td>{{ $viewAgent->handphone_number }}</td>
                    <td>{{ $viewAgent->gender }}</td>
                    <td>{{ $viewAgent->type }}</td>
                    <td><a href="{{ route('agent.edit',['id'=>$viewAgent->id]) }}" class="btn btn-warning btn-xs">Edit</a> </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
        <br><br>
    </div>
</div>
@endsection