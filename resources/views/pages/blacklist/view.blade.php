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
                    <td>Member Name</td>
                    <td>Reason</td>
                    <td>Remark</td>
                </tr>
            </thread>
            <tbody>
                @foreach($users as $view)
                <tr>
                    <td>{{ $view->name }}</td>
                    <td>{{ $view->reason }}</td>
                    <td>{{ $view->remark }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br><br>
    </div>
</div>
@endsection