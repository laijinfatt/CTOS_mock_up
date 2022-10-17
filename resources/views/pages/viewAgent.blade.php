@extends('layout')
@include('sidenav')
@section('content')
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <h3>Agent Lists</h3>
        <table class="table table-bordered">
            <thread>
                <tr>
                    <td>Name</td>
                    <td>Email</td>
                    <td>IC</td>
                    <td>Handphone Number</td>
                    <td>Gender</td>
                    <td>Type</td>
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
                </tr>
                @endforeach
            </tbody>
        </table>
        <br><br>
    </div>
</div>
@endsection