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
th{
        font-weight:500; 
         cursor: pointer;
    }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"> </script>    
<script type="text/javascript" src="/js/sortTable.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ url('css/search.css') }}">
<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-6">
        <br>
        <div class="card">
        <h3>Agents Information</h3><br>
        <button style="width:70px;" class="btn btn-primary"
                    onclick= "window.location.href = '/agent-registration';">Create</button>
        <form action="{{route('agent.search')}}" method="POST">
                @csrf
            <div class="search">
                            <div class="input">
                          
                            <button type="submit"><i class="fa fa-search"></i></button> 
                            <input name="keyword" type="search" placeholder="Search" >
                                
                            </div>
                    </div>
            </form>
     
        <table id="mylists" class="table table-bordered">
            <thread>
                <tr class="trhead">
                <th onclick="sortTable(0)">Name</th>
                <th onclick="sortTable(1)">Email</th>
                <th onclick="sortTable(2)">IC</th>
                <th onclick="sortTable(3)">Handphone Number</th>
                <th onclick="sortTable(4)">Gender</th>
                <th>Action</th>
                    
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
                    <td style='white-space: nowrap'>
                    <a href="{{ route('agent.edit',['id'=>$viewAgent->id]) }}" class="btn btn-warning btn-xs">Edit</a>
                    <a href="{{ route('agent.delete',['id'=>$viewAgent->id]) }}" class="btn btn-danger btn-xs"  
                    onClick="return confirm('Are you sure to delete?')">Delete</a>
                </td> 
                </tr>
                @endforeach
            </tbody>
        </table>
        <div >
        {{ $users -> links("pagination::bootstrap-4")}}
    </div>
        <br>
        </div>
    </div>
</div>
@endsection